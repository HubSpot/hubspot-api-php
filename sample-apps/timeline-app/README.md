# HubSpot-php sample Timeline app

This is a sample app for the [hubspot-php SDK](../../../../).
Currently, this app is focused on demonstrating of [Timeline API](https://developers.hubspot.com/docs/api/crm/extensions/timeline)
integration with [Telegram](https://telegram.org/).

### HubSpot CRM and Telegram messenger integration
This application lets you communicate with your CRM contacts via Telegram messanger chat bot and keep track of their responses in HubSpot CRM Contact's Timeline.
 It demonstrates the use of [HubSpot Timeline API](https://developers.hubspot.com/docs/api/crm/extensions/timeline) as well as [HubSpot Contact API](https://developers.hubspot.com/docs-beta/crm/contacts) and Telegram Chat Bot API. As of now you can create new Event Templates in CRM using this application but only two Event Templates are used to create Timeline Events recording customer's responses to the event invites sent via Telegram Chat Bot.

You can
- Authorize this application with HubSpot using OAuth 2.0 - see [OAuth2Helper.php](src/Helpers/OAuth2Helper.php) for OAuth 2.0 utilities.
  - Note: we store access tokens in MySQL DB
- Initialization script [init.php](src/actions/events/init.php) creates two Event Templates in HubSpot associated with your Application (you should use Developer HAPI Key for that)
  - User is expected to run this script first in the application
- Invite your contacts to use Telegram Chat Bot [TelegramBotHelper.php](src/Helpers/TelegramBotHelper.php)
  - We use [Telegram deep linking](https://core.telegram.org/bots#deep-linking) to map CRM Contact (identified by email) and their chat ID with Telegram Bot. 
  - Generate bot link, share it with the contact. 
- Manage your Event Templates [src/actions/templates] 
- Create invites to your events and send them to your Static Contact Lists [src/actions/invitations]
  - Telegram bot sends invitations to participate in events. 
  - If a contact responds  - corresponding timeline event will be created.
  - Sending an invite as well as user starting the Bot are also recored as Timeline Events
- Track Contact's responses as Timeline Events using [TimelineEventHelper.php](src/Helpers/TimelineEventHelper.php)

Please see the documentation on:
- 
- [How do I create an app in HubSpot?](https://developers.hubspot.com/docs-beta/creating-an-app)
- [How do I find the app ID for a HubSpot app?](https://developers.hubspot.com/docs/faq/how-do-i-find-the-app-id)
- [Developer HAPIkeys](https://developers.hubspot.com/docs/faq/developer-hapikeys)
- [Telegram bots: An introduction for developers](https://core.telegram.org/bots)

### Setup App

Make sure you have [Docker Compose](https://docs.docker.com/compose/).

### Configure

1. Copy .env.template to .env
2. Specify HubSpot authorization data in .env:

   - Paste your Developer HAPI Key as the value for HUBSPOT_DEVELOPER_API_KEY

   and

   - Paste HUBSPOT_CLIENT_ID, HUBSPOT_CLIENT_SECRET and HUBSPOT_APPLICATION_ID for OAuth
    
3. Register telegram bot using [this guide](https://core.telegram.org/bots). Specify received bot data in .env:
   
    - Paste TELEGRAM_BOT_API_TOKEN and TELEGRAM_BOT_USERNAME
    
### Running

The best way to run this project (with the least configuration), is using docker compose.  Change to the webroot and start it

```bash
docker-compose up --build web
```
You should now be able to navigate to [http://localhost:8999](http://localhost:8999) and use the application.

### Debugging

To see telegram bot logs execute

```bash
docker-compose exec web cat /var/log/supervisor/telegram-handle-updates-out.log
```

### Project structure:

- A background job listens for telegram updates, handles users replies. It is implemented by 
`src/console/telegram/handleUpdates.php`
- CRUD actions for invitations, event types, oauth are located in `src/actions`
