<?php

/**
 * BaseCompany
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property Doctrine_Collection $Contacts
 * 
 * @method string              getName()     Returns the current record's "name" value
 * @method string              getCity()     Returns the current record's "city" value
 * @method string              getState()    Returns the current record's "state" value
 * @method string              getZip()      Returns the current record's "zip" value
 * @method Doctrine_Collection getContacts() Returns the current record's "Contacts" collection
 * @method Company             setName()     Sets the current record's "name" value
 * @method Company             setCity()     Sets the current record's "city" value
 * @method Company             setState()    Sets the current record's "state" value
 * @method Company             setZip()      Sets the current record's "zip" value
 * @method Company             setContacts() Sets the current record's "Contacts" collection
 * 
 * @package    skeleton
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseCompany extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('company');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('city', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('state', 'string', 25, array(
             'type' => 'string',
             'length' => '25',
             ));
        $this->hasColumn('zip', 'string', 25, array(
             'type' => 'string',
             'length' => '25',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Contact as Contacts', array(
             'local' => 'id',
             'foreign' => 'company_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}