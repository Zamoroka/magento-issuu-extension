<?php

/**
 * Created by PhpStorm.
 * User: zamoroka
 * Date: 22.04.2017
 * Time: 0:18
 */
interface ResponseInterface
{
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @return string
     */
    public function getAuthorName();

    /**
     * @return string
     */
    public function getAuthorUrl();

    /**
     * @return string
     */
    public function getHtml();

    /**
     * @return string
     */
    public function getThumbnailUrl();

    /**
     * @return int
     */
    public function getThumbnailWidth();

    /**
     * @return int
     */
    public function getThumbnailHeight();
}

/*
object(stdClass)#2 (15) {
["version"]=> string(3) "1.0"
["type"]=> string(4) "rich"
["width"]=> int(525)
["height"]=> int(802)
["title"]=> string(23) "TechnologyEd (Issue 16)"
["description"]=> string(383) "Each term we be bring you the latest ICT news from schools and education departments at home and abroad, as well as reviews and tech tips from teachers, and details of upcoming PD events. We also look at how ICT fits into core subject teaching in the new Australian curriculum, explore issues affecting the education sector and highlight some of the gadgets and gizmos on the market."
["url"]=> string(40) "https://issuu.com/tempomedia/docs/ted-16"
["author_name"]=> string(10) "tempomedia"
["author_url"]=> string(28) "https://issuu.com/tempomedia"
["provider_name"]=> string(5) "Issuu"
["provider_url"]=> string(17) "https://issuu.com"
["html"]=> string(201) "Publish for Free"
["thumbnail_url"]=> string(96) "https://image.issuu.com/150811013754-6982f8eb818db132b14173548aa28813/jpg/page_1_thumb_large.jpg"
["thumbnail_width"]=> int(320)
["thumbnail_height"]=> int(419)
}
}
*/