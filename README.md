#rename
1. `PLUGIN_VERSION` to `YOUR_PLUGIN_VERSION`
2. `plugin-name` folder to `your-plugin-name` 
3. `plugin-name.php` folder to `your-plugin-name.php`
4. rename namespaces form `PluginName` to `YourPluginName`
5. change name in composer from `"plugin/plugin-name"` to `"author/your-plugin-name"`
6. change composer.json `PluginName\\` to  `YourPluginName\\`
7. `composer install`
8. `composer dumpautoload -o`




#toDo

* adding custom assets from controller