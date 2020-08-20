# HubSpot PHP Retry Middleware Sample App

This is a sample app for the [hubspot-php SDK](../../../../). Currently, this app focuses on demonstrating the retry middleware mechanism. It will be useful for you if you often reach rate limit (429 http error).

Please see the documentation on [Creating an app in HubSpot](https://developers.hubspot.com/docs-beta/creating-an-app)

### HubSpot Public API endpoints used in this application

  - [Contacts](https://developers.hubspot.com/docs-beta/crm/contacts)
  - [OAuth](https://developers.hubspot.com/docs-beta/working-with-oauth)

### Setup App

Make sure you have [Docker Compose](https://docs.docker.com/compose/) installed.

 - The code in all folders except for console is to provide OAuth UI for the useer. 
 - [example.php](src/console/example.php) creates batches of requests to Create/Delete Contacts API to cause exceeding of therate limit 
  - PROCESS_COUNT (set in .env file) controls the number of processes launched by docker running example.php - usually it takes about 10 to reach ratee limit

### Configure

1. Copy .env.template to .env
2. Specify authorization data in .env:
    
    - Paste your HubSpot API Key as the value for HUBSPOT_API_KEY
    
    or
    
    - Paste HUBSPOT_CLIENT_ID and HUBSPOT_CLIENT_SECRET for OAuth

### Running

The best way to run this project (with the least configuration), is using docker compose.  Change to the webroot and start it

```bash
docker-compose up -d --build
```
You should now be able to navigate to [http://localhost:8999](http://localhost:8999). 
Firstly you will need to authorize via OAuth there.
Than you can to go to the terminal window and start the following command in the application root

```bash
docker-compose exec web php /app/src/console/example.php
```

Please note this app starts a few workers in order to reach rate limit.

Pay attention on [HubspotClientHelper](src/Helpers/HubspotClientHelper.php).
It generates a custom client with reties middlewares and pass this client to HubSpot Factory. 
