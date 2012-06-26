<?php
/**
 *@file
 *UserProxyPortletConfig Data Object
 *
 *The object contains general information about
 *that are retrieved from the webservice
 *
 */
class ThemeImageBarInfo {
  private $_imagebar_id;
  private $_imagebar_title;
  private $_imagebar_title_link;
  private $_imagebar_subtitle;
  private $_imagebar_subtitle_link;
  private $_imagebar_promobox_text;
  private $_imagebar_promobox_link;
  private $_imagebar_promobox_color;
  private $_imagebar_imageurl;
  private $_imagebar_reader_note;
  private $_imagebar_activeurl;

  /**
   * Constructor
   */
  public function __construct(
                              $imagebar_id = NULL,
                              $imagebar_title = NULL,
                              $imagebar_title_link = NULL,
                              $imagebar_subtitle = NULL,
                              $imagebar_subtitle_link = NULL,
                              $imagebar_promobox_text = NULL,
                              $imagebar_promobox_link = NULL,
                              $imagebar_promobox_color = NULL,
                              $imagebar_imageurl = NULL,
                              $imagebar_reader_note = NULL,
                              $imagebar_activeurl = NULL)
  {
    $this->_imagebar_id = $imagebar_id;
    $this->_imagebar_title = $imagebar_title;
    $this->_imagebar_title_link = $imagebar_title_link;
    $this->_imagebar_subtitle = $imagebar_subtitle;
    $this->_imagebar_subtitle_link = $imagebar_subtitle_link;
    $this->_imagebar_promobox_text = $imagebar_promobox_text;
    $this->_imagebar_promobox_link = $imagebar_promobox_link;
    $this->_imagebar_promobox_color = $imagebar_promobox_color;
    $this->_imagebar_imageurl = $imagebar_imageurl;
    $this->_imagebar_reader_note = $imagebar_reader_note;
    $this->_imagebar_activeurl = $imagebar_activeurl;
  }
  
  /*
   *Sets the imagebar_id
   *@param $imagebar_id
   *  imagebar_id
   */
  public function set_imagebar_id($imagebar_id)
  {
    $this->_imagebar_id = $imagebar_id;
  }
  
  /*
   *Sets the imagebar_title
   *@param $imagebar_title
   *  imagebar_title
   */
  public function set_imagebar_title($imagebar_title)
  {
    $this->_imagebar_title = $imagebar_title;
  }

  /*
   *Sets the imagebar_title_link
   *@param $imagebar_title_link
   *  imagebar_title_link
   */
  public function set_imagebar_title_link($imagebar_title_link)
  {
    $this->_imagebar_title_link = $imagebar_title_link;
  }
  
  /*
   *Sets the imagebar_subtitle
   *@param $imagebar_subtitle
   *  imagebar_subtitle
   */
  public function set_imagebar_subtitle($imagebar_subtitle)
  {
    $this->_imagebar_subtitle = $imagebar_subtitle;
  }
  
  /*
   *Sets the imagebar_subtitle_link
   *@param $imagebar_subtitle_link
   *  imagebar_subtitle_link
   */
  public function set_imagebar_subtitle_link($imagebar_subtitle_link)
  {
    $this->_imagebar_subtitle_link = $imagebar_subtitle_link;
  }

  /*
   *Sets the imagebar_promobox_text
   *@param $imagebar_promobox_text
   *  imagebar_promobox_text
   */
  public function set_imagebar_promobox_text($imagebar_promobox_text)
  {
    $this->_imagebar_promobox_text = $imagebar_promobox_text;
  }

  /*
   *Sets the imagebar_promobox_link
   *@param $imagebar_promobox_link
   *  imagebar_promobox_link
   */
  public function set_imagebar_promobox_link($imagebar_promobox_link)
  {
    $this->_imagebar_promobox_link = $imagebar_promobox_link;
  }

  /*
   *Sets the imagebar_promobox_color
   *@param $imagebar_promobox_color
   *  imagebar_promobox_color
   */
  public function set_imagebar_promobox_color($imagebar_promobox_color)
  {
    $this->_imagebar_promobox_color = $imagebar_promobox_color;
  }

  /*
   *Sets the imagebar_imageurl
   *@param $imagebar_imageurl
   *  imagebar_imageurl
   */
  public function set_imagebar_imageurl($imagebar_imageurl)
  {
    $this->_imagebar_imageurl = $imagebar_imageurl;
  }
  
  /*
   *Sets the imagebar_reader_note
   *@param $imagebar_reader_note
   *  imagebar_reader_note
   */
  public function set_imagebar_reader_note($imagebar_reader_note)
  {
    $this->_imagebar_reader_note = $imagebar_reader_note;
  }

  /*
   *Sets the imagebar_activeurl
   *@param $imagebar_activeurl
   *  imagebar_activeurl
   */
  public function set_imagebar_activeurl($imagebar_activeurl)
  {
    $this->_imagebar_activeurl = $imagebar_activeurl;
  }
  
  /*
   *Retrieves the imagebar_id
   */
  public function get_imagebar_id()
  {
    return $this->_imagebar_id;
  }

  /*
   *Retrieves the imagebar_title
   */
  public function get_imagebar_title()
  {
    return $this->_imagebar_title;
  }
  
  /*
   *Retrieves the imagebar_title_link
   */
  public function get_imagebar_title_link()
  {
    return $this->_imagebar_title_link;
  }

  /*
   *Retrieves the imagebar_subtitle
   */
  public function get_imagebar_subtitle()
  {
    return $this->_imagebar_subtitle;
  }

  /*
   *Retrieves the imagebar_subtitle_link
   */
  public function get_imagebar_subtitle_link()
  {
    return $this->_imagebar_subtitle_link;
  }

  /*
   *Retrieves the imagebar_promobox_text
   */
  public function get_imagebar_promobox_text()
  {
    return $this->_imagebar_promobox_text;
  }

  /*
   *Retrieves the imagebar_promobox_link
   */
  public function get_imagebar_promobox_link()
  {
    return $this->_imagebar_promobox_link;
  }

  /*
   *Retrieves the imagebar_promobox_color
   */
  public function get_imagebar_promobox_color()
  {
    return $this->_imagebar_promobox_color;
  }

  /*
   *Retrieves the imagebar_imageurl
   */
  public function get_imagebar_imageurl()
  {
    return $this->_imagebar_imageurl;
  }
  
  /*
   *Retrieves the imagebar_reader_note
   */
  public function get_imagebar_reader_note()
  {
    return $this->_imagebar_reader_note;
  }

  /*
   *Retrieves the imagebar_activeurl
   */
  public function get_imagebar_activeurl()
  {
    return $this->_imagebar_activeurl;
  }

}