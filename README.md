# Grav Rest Form Plugin

The **Rest Form** Plugin is an extension of the form plugin of [Grav CMS](http://github.com/getgrav/grav).
With this plugin you can save added forms by calling a REST service.


## Installation

Installing the Grav Rest Contents plugin can be done in one of two ways. The GPM (Grav Package Manager) installation method enables you to quickly and easily install the plugin with a simple terminal command, while the manual method enables you to do so via a zip file.

### GPM Installation (Preferred)

The simplest way to install this plugin is via the [Grav Package Manager (GPM)](http://learn.getgrav.org/advanced/grav-gpm) through your system's terminal (also called the command line).  From the root of your Grav install type:

    bin/gpm install grav-rest-contents

This will install the Grav Rest Contents plugin into your `/user/plugins` directory within Grav. Its files can be found under `/your/site/grav/user/plugins/grav-rest-contents`.

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `grav-rest-contents`. You can find these files on [GitHub](https://github.com/andrea-schiona/grav-plugin-grav-rest-contents) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/rest-form
	
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Form](https://github.com/getgrav/grav-plugin-form) to operate.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/grav-rest-contents/grav-rest-contents.yaml` to `user/config/plugins/grav-rest-contents.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
```

## Usage

**TODO**


## To Do

- [1] Release the first version of the plugin;
- [2] Complete this documentation;
- [3] Create a docker image for test the plugin.


