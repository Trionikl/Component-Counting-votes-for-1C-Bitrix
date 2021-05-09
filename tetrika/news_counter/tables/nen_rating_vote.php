<?
namespace UserRating\MyTables;  // должен быть первым

use Bitrix\Main\Entity;

class NenRatingVoteTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'nen_rating_vote';
    }
    
    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID' , array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\StringField('RATING_VOTING_ID'),
			new Entity\StringField('VALUE')			
        );
    }
}


class NenIpAddressTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'nen_ip_address';
    }
    
    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID' , array(
                'primary' => true,
                'autocomplete' => true
            )),
            new Entity\StringField('IP'),
			new Entity\StringField('RATING_VOTING_ID')
        );
    }
}



?>