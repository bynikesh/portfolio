<?php require_once 'db.php'; ?>
<?php
class rss  {

  /**
   * Constructor
   *
   * @param array $a_db database settings
   * @param string $xmlns XML namespace
   * @param array $a_channel channel properties
   * @param string $site_url the URL of your site
   * @param string $site_name the name of your site
   * @param bool $full_feed flag for full feed (all topic content)
   */
  public function __construct() {
    // initialize
    
    $this->xmlns = ($xmlns ? ' ' . $xmlns : '');
    $this->channel_properties = $a_channel;
    $this->site_url = $site_url;
    $this->site_name = $site_name;
    $this->full_feed = $full_feed;

   }
 
  /**
   * Generate RSS 2.0 feed
   *
   * @return string RSS 2.0 xml
   */
  public function create_feed() {

    ob_clean();
 
    $xml = '<?xml version="1.0" encoding="utf-8"?>' . "\n";
 
    $xml .= '<rss version="2.0">' . "\n";
 
    // channel required properties
    $xml .= '<channel>' . "\n";
    $xml .= '<title>test</title>' . "\n";
    $xml .= '<link>test</link>' . "\n";
    $xml .= '<description>test</description>' . "\n";
 
    // channel optional properties

                    $db = new db();

                   
                     $query = "SELECT postid, posttitle, postdescription FROM article  ORDER BY postid DESC LIMIT 15";

                     

                     
               
 
    // get RSS channel items
    //$now =  date("YmdHis"); // get current time  // configure appropriately to your environment
    $rss_items = $db->select($query);
  //var_dump($rss_items);die;
    foreach($rss_items as $rss_item) {
      $xml .= '<item>' . "\n";
      $xml .= '<title>' . $rss_item['posttitle'] . '</title>' . "\n";
    
      $xml .= '<description>' . $rss_item['postdescription'] . '</description>' . "\n";
     
     /* $xml .= '<category>' . $rss_item['category'] . '</category>' . "\n";
      $xml .= '<source>' . $rss_item['source'] . '</source>' . "\n";*/
    
 
      $xml .= '</item>' . "\n";
    }
 
    $xml .= '</channel>';
 
    $xml .= '</rss>';
    //var_dump($xml);

    return $xml;
  }
 
 }