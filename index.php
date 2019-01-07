<html>
  <body>
    <?php
      try {
        $mem = new Memcached();
        $mem->setOption(Memcached::OPT_BINARY_PROTOCOL, true);
        $mem->addServer(getenv('MEMCACHED_SERVER_ADDR'), 11211);
        $mem->setSaslAuthData(getenv('MEMCACHED_USERNAME'), getenv('MEMCACHED_PASSWORD'));

        echo '<pre><code>';
        print_r($mem->getStats());
        echo '</code></pre>';

        $mem->set("hello", "World");

        echo 'Hello '.$mem->get("hello");

        $mem->quit();
      } catch(Exception $e) {
        var_dump($e);
      }
    ?>
  </body>
</html>
