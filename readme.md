# zion.software - public

This is my website, known as zion.software

- **Something's broken or it's complicated?** [Open an issue](https://github.com/ProZion24/zion.software-public/issues/new/choose)
  - Please keep issues in english, this makes it easier for everyone to participate and keeps issues relevant to link to.

## Features
* Website where everyone can see what you're listening to on Spotify
* Full [Spotify-API](https://github.com/jwilsson/spotify-web-api-php)

## Bot Commands
The bot is fully operable via chat and the webinterface. 
To get started write `!help` to the bot.

## Download
* Download the website from [releases](https://github.com/ProZion24/zion.software-public/releases/)

## Install

1. Visit the [Spotify Development Panel](https://developer.spotify.com/dashboard/applications) and create an application
1. Whitelist in the settings of the application your domain in the "Redirect URIs". Example: `https://zion.software/gettoken.php`
1. Add your Client-ID, Client-Secret and Redirect-URI in the Config.php
1. Install the Composer-File with `composer install` inside the document-root of the website where you copied the files
1. Visit the file `gettoken.php` on your website. Then you have to log in into Spotify and accept the OAuth request. 
1. When you got redirected, copy the Code that is shown into `REFRESH_TOKEN` in the Config.php
1. (Optional) For security reasons, disable the access to `gettoken.php`.
1. Done! Now you can use that shit! If something does'nt work, please [open an issue](https://github.com/ProZion24/zion.software-public/issues/new/choose)

## TODO 
* Auto-Update