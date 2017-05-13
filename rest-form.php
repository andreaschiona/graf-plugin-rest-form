<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class GravRestPlugin
 * @package Grav\Plugin
 */
class GravRestContentsPlugin extends Plugin
{

    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0],
            'onFormProcessed' => ['onFormProcessed', 0]
        ];
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {

        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

    }

    /**
     * Do some work for this event, full details of events can be found
     * on the learn site: http://learn.getgrav.org/plugins/event-hooks
     *
     * @param Event $e
     */
    public function onPageContentRaw(Event $e)
    {
        // Get a variable from the plugin configuration
        $text = $this->grav['config']->get('plugins.grav-rest-contents.text_var');

        // Get the current raw content
        $content = $e['page']->getRawContent();

        // Prepend the output with the custom text and set back on the page
        $e['page']->setRawContent($text . "\n\n" . $content);
    }

	/**
     * Call REST Service when processing the form.
     *
     * @param Event $event
     */
    public function onFormProcessed(Event $event)
    {
        $form = $event['form'];
                $action = $event['action'];
                $params = $event['params'];

        		switch($action) {
        			case 'rest':

        				$service_url = $this->config->get('plugins.grav-rest-contents.rest_server');
                        $curl = curl_init($service_url);
                        foreach($params['fields'] as $field => $val) {
                            $postData[] = $field -> $_POST[$val];
                        }
                        curl_setopt_array($curl, array(
                            CURLOPT_POST => TRUE,
                            CURLOPT_RETURNTRANSFER => TRUE,
                            CURLOPT_HTTPHEADER => array(
                                'Content-Type: application/json'
                            ),
                            CURLOPT_POSTFIELDS => json_encode($postData)
                        ));

                        $curl_response = curl_exec($curl);
                        if ($curl_response === false) {
                            $info = curl_getinfo($curl);
                            curl_close($curl);
                            die('error occured during curl exec. Additioanl info: ' . var_export($info));
                        }
                        curl_close($curl);
                        $decoded = json_decode($curl_response);
                        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
                            die('error occured: ' . $decoded->response->errormessage);
                        }
                        echo 'response ok!';
                        var_export($decoded->response);
        			break;
        		}
	}
}
