# Galactic Codebreaker
**Authors:** jporter0731, robweber

A PHP passcode game to reinforce passcode importance.

![Home Page Screenshot](https://github.com/jporter0731/cybergame/blob/master/screenshots/Home%20Page.png)

## Background
Businesses are always looking for alternative ways to reinforce important topics in the workplace without always using a meeting or memo. That is the thought process that led to the idea of Galactic Codebreaker. It is an abstract combination of popular games while also being a unique way to help reinforce the importance of complex passcodes. This game straddles the line between fun gameplay and learning tool for the workplace. The creative decision was made to make the game more fun to play than it is a learning tool. The idea being that we wanted the game to be fun enough so that employees would take time out of their busy days to play it.
## Install
This program can be run from a docker container. There are some basic instructions to get this up and running in the [INSTALL.md]( https://github.com/jporter0731/cybergame/blob/master/INSTALL.md) file. 
## Usage
This game is built with the assistance of Bootstrap. As such, it is flexible between different monitors and devices. It is not perfect and has not been tested on devices that are smaller than an iPad. Use on devices smaller than an iPad is not recommended for this game.

If you would like to use LDAP for user verification, you will need to modify the code in the credentials.php file in the private directory with your specific information. If you would like to use this program without LDAP verification, you will need to modify the credentials.php file along with the login_logic.php file to properly verify logins.
## Why?
Galactic Codebreaker is a PHP learning project that was used to get a better understanding of the language. As such, there are quite a few processes that might not be as efficient as they should/could be. Additionally, we thought this would be a good opportunity to reinforce the importance of complex passcodes. The hope with this game would be to help teach a lesson without having to schedule another meeting or send out another memo.
