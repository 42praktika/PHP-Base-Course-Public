<?php

namespace app\viewmodels\adminPanel;

use app\core\Template;
use app\models\Tag;

class AdminTagListItemViewModel
{
    /**
     * @param Tag $tag
     * @return string
     */
    public static function getView(Tag $tag) : string
    {
        $tagListItem = Template::ReturnView("adminPanel/components/adminTagListItem.html", ["title" => $tag->getTitle(), "id" => $tag->getId()]);
        return $tagListItem;
    }
}