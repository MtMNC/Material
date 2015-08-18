# What is 'Material'? <img src="https://travis-ci.org/codyn329/Material.svg?branch=master" align="right"/>
> A MediaWiki skin based on Google's Material Design language

This is a project in **early alpha phase** that aims to combine Material Design with MediaWiki to create a new skin. In the visual environment, everything is interactive, showing movement to support the idea that the user is in control. Elements inside it aren't just about the aesthetics, but also about structure and meaning. The interface has colors that convey emotion, typefaces to encourage readability, pictures that are worth a thousand words, and more. 

As it's continuously being developed, we keep in mind seven important factors listed below to always create a harmonious experience for the user to engage in. 
- **Accessibility**  
- **Cross-browser support**
- **Cross-device support**
- **Performance**
- **Security**
- **Navigation**
- **Internationalization** (i18n)

# How to install
1. Download the files into <code>[$IP](https://www.mediawiki.org/wiki/Manual:$IP)/skins/Material</code>
2. In the file named <code>LocalSettings.php</code>, add one of the following lines, depending what version of MediaWiki you're running. 
 * ```php include_once "$IP/skins/Material/Material.php";``` (for MW v1.24 or older) 
 * ```wfLoadSkin( 'Material' );``` (for MW v1.25 or newer)
3. You can now verify that the skin is installed by checking Special:Version!

# How to contribute
As an open-source project, contributions are not only allowed but *encouraged* :D! If you'd like to learn how to help improve this MediaWiki skin, here are some things on what you could do:
* **Submit an issue ticket** - Issues are located at [codyn329/Material/issues](https://github.com/codyn329/Material/issues). The issue you submit can revolve around a new feature, optimizing performance, more efficient code, whatever! As long as its relevant to the project scope, issues are welcomed. Keep in mind to provide constructive feedback and be polite :)
* **Make a commit to a file** - Make sure you add a description and a title summary on what you're intending to do so other users can understand. 
