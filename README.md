# Facebook PHP Graph SDK Examples
A simple Sign In example using  Facebook PHP Graph SDK.

## Steps

1. Create a Facebook Developer account on [Facebook Developer](https://developers.facebook.com). 
2. Create an App on [Facebook Developer - Apps Dashboard](https://developers.facebook.com/apps/).
3. Use your App's APP_ID and APP_SECRET on the file app/init.php.

```php
$fb = new \Facebook\Facebook([
  'app_id' => 'APP_ID',
  'app_secret' => 'APP_SECRET',
  'default_graph_version' => 'v2.10',
]);
```
4. Start your server from the root folder. For example:
```cmd
php -S localhost:80
```

5. Access the web page going to: [Localhost](http://localhost).