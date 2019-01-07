<html>
  <body>
    <?php
      $mem = new Memcached();
      $mem->setOption(Memcached::OPT_BINARY_PROTOCOL, true);
      $mem->addServer(getenv('MEMCACHED_SERVER_ADDR'), 11211);
      $mem->setSaslAuthData(getenv('MEMCACHED_USERNAME'), getenv('MEMCACHED_PASSWORD'));
      $mem->set("hello", "World");

      echo 'Hello '.$mem->get("hello");

      $mem->quit();
    ?>
  </body>
</html>
