# HubSpot-php sample Companies app

This is a sample app for the [hubspot-php SDK](../../). Currently, this app focuses on demonstrating the functionality of [Companies API](https://developers.hubspot.com/docs/methods/companies/companies-overview) endpoints and their related actions.

Please see the documentation on [Creating an app in HubSpot](https://developers.hubspot.com/docs-beta/creating-an-app)

### HubSpot Public API links used in this application

  - [Get all companies](https://developers.hubspot.com/docs-beta/crm/companies) `GET/crm/v3/objects/companies`
  - [Create a Company](https://developers.hubspot.com/docs-beta/crm/companies)  `POST/crm/v3/objects/companies`
  - [Update a Company](https://developers.hubspot.com/docs-beta/crm/companies)
  - [Search for companies by domain](https://developers.hubspot.com/docs-beta/crm/companies)
  - [Get a Company](https://developers.hubspot.com/docs/methods/companies/get_company)
  - [Get Contacts at a Company](https://developers.hubspot.com/docs-beta/crm/companies)
  - [Get all Company Properties](https://developers.hubspot.com/docs-beta/crm/companies)
  - [Associate CRM objects](https://developers.hubspot.com/docs-beta/crm/companies)
  - [Delete an association](https://developers.hubspot.com/docs-beta/crm/companies)

### Setup App

Make sure you have [Docker Compose](https://docs.docker.com/compose/) installed.

### Configure

1. Copy .env.template to .env
2. Paste your HUBSPOT_CLIENT_ID and HUBSPOT_CLIENT_SECRET

### Running

The best way to run this project (with the least configuration), is using docker compose.  Change to the webroot and start it

```bash
docker-compose up --build web
```
You should now be able to navigate to [http://localhost:8999](http://localhost:8999) and use the application.
