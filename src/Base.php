<?php
namespace VIH\Event;

abstract class Base extends \TCPDF
{
    protected $heading = 'Vejle Idrætshøjskoles foredrag';
    protected $sub_title = 'Kom og høre med!';
    protected $description = 'description';
    protected $logo;
    protected $events = array();
    protected $link = '';
    protected $base_url = '';
    protected $author;
    protected $font = 'helvetica';
    protected $frontpage_font = 'helvetica';

    public function setBaseUrl($base_url)
    {
        $this->base_url = $base_url;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

  /**
   * @param string $logo Path to the logo
   */
    public function setLogo($logo, $link = null)
    {
        $this->logo = $logo;
        $this->link = $link;
    }

    public function setHeading($title)
    {
        $this->heading = $title;
    }

    public function setSubtitle($title)
    {
        $this->sub_title = $title;
    }

    public function setDescription($desc)
    {
        $this->description = $desc;
    }

    // @codingStandardsIgnoreStart
    public function Header()
    {
        // left blank to remove line in header added by TCPDF
    }

    public function Footer()
    {
        // left blank to remove line in header added by TCPDF
    }
    // @codingStandardsIgnoreEnd

    public function clearJavascript($s)
    {
        $do = true;
        while ($do) {
            $start = stripos($s, '<script');
            $stop = stripos($s, '</script>');
            if ((is_numeric($start)) && (is_numeric($stop))) {
                $s = substr($s, 0, $start) . substr($s, ($stop + strlen('</script>')));
            } else {
                $do = false;
            }
        }
        return trim($s);
    }

    /**
     * @todo Should utilize Drupal own t()-function
     */
    protected function t($phrase)
    {
        // Default to English
        $phrases = array(
        'Monday' => 'mandag',
        'Tuesday' => 'tirsdag',
        'Wednesday' => 'onsdag',
        'Thursday' => 'torsdag',
        'Friday' => 'fredag',
        'Saturday' => 'lørdag',
        'Sunday' => 'søndag',
        'January' => 'januar',
        'February' => 'februar',
        'March' => 'marts',
        'April' => 'april',
        'May' => 'maj',
        'June' => 'juni',
        'July' => 'juli',
        'August' => 'august',
        'September' => 'september',
        'October' => 'oktober',
        'November' => 'november',
        'December' => 'december',
        '1' => 'januar',
        '2' => 'februar',
        '3' => 'marts',
        '4' => 'april',
        '5' => 'maj',
        '6' => 'juni',
        '7' => 'juli',
        '8' => 'august',
        '9' => 'september',
        '10' => 'oktober',
        '11' => 'november',
        '12' => 'december'
        );
        if (!empty($phrases[$phrase])) {
            return $phrases[$phrase];
        }
        return $phrase;
    }

    abstract public function render();

    /**
     * Gets barcode file path
     *
     * @param string $url Registration url
     * @param integer $height Height
     * @param integer $width Width
     *
     * @return string or false
     */
    protected function getBarcodePath($url, $height, $width)
    {
        $chart = array(
        '#chart_id' => 'lecture_chart_' . md5($url),
        '#type' => CHART_TYPE_QR,
        '#size' => chart_size(200, 200),
        );

        $chart['#data'][] = '';
        $chart['#labels'][] = $url;

        return chart_copy($chart, 'lecture_qr_' . md5($url), 'public://charts/');
    }
}
