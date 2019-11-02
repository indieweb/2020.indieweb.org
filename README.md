# 2020.indieweb.org

To create a new event for a city, you'll need to create a few files:

* `public/{city}.php` - the main file for the event
* `templates/{city}` - the schedule and sponsor files live here so they are easier to edit

To pull RSVPs from Tito registrations and to accept webmentions, add the event to the `active-events.json` file. The file is in the following format:

```json
{
  "slug": "tito-event-path"
}
```

For example, an event with a slug on this web page of `summit`, which is mapped to a Tito event URL like `https://ti.to/indiewebcamp/summit-2019` would be defined in this file as: `"summit": "summit-2019"`.


