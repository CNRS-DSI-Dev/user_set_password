# User Set Password

Based on firstrunwizard, this ownCloud7 app displays to a new user a popup window asking him to set his local password. This popup window will only appears once.

## How does that work ?

A flag `show` is set to 1 in the `oc_preferences` table. As the user log on ownCloud, the app looks at this flaf. If it's set to 1 or if it's not present, the popup is displayed, asking for a local password.
The user may bypass this popup (it's not mandatory).

When the password is set, or the popup bypassed, the flag is set to 0.

## Command line utilities

Two utilities are provided. The first allows to set flag to 0 to all existing users (inserting the flag or updating it).

```sh
sudo -u apache ./occ user_set_password:init
```

the second utility allows to reset all flags to 0.

```sh
sudo -u apache ./occ user_set_password:reset
```

## Contributing

This app is developed for an internal deployement of ownCloud at CNRS (French National Center for Scientific Research).

If you want to be informed about this ownCloud project at CNRS, please contact david.rousse@dsi.cnrs.fr, gilian.gambini@dsi.cnrs.fr or marc.dexet@dsi.cnrs.fr

## License and authors

|                      |                                          |
|:---------------------|:-----------------------------------------|
| **Author:**          | Patrick Paysant (<ppaysant@linagora.com>)
| **Copyright:**       | Copyright (c) 2015 CNRS DSI
| **License:**         | AGPL v3, see the COPYING file.
