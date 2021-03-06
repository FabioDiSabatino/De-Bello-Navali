<?php

namespace Persistence\WeaponDescriptionPersistence\Map;

use Persistence\WeaponDescriptionPersistence\WeaponDescription;
use Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'weapondescription' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class WeaponDescriptionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Persistence\WeaponDescriptionPersistence.Map.WeaponDescriptionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'weapondescription';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Persistence\\WeaponDescriptionPersistence\\WeaponDescription';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Persistence\WeaponDescriptionPersistence.WeaponDescription';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the weaponName field
     */
    const COL_WEAPONNAME = 'weapondescription.weaponName';

    /**
     * the column name for the rangeName field
     */
    const COL_RANGENAME = 'weapondescription.rangeName';

    /**
     * the column name for the ammo field
     */
    const COL_AMMO = 'weapondescription.ammo';

    /**
     * the column name for the reloadtime field
     */
    const COL_RELOADTIME = 'weapondescription.reloadtime';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('WeaponName', 'Rangename', 'Ammo', 'Reloadtime', ),
        self::TYPE_CAMELNAME     => array('weaponName', 'rangename', 'ammo', 'reloadtime', ),
        self::TYPE_COLNAME       => array(WeaponDescriptionTableMap::COL_WEAPONNAME, WeaponDescriptionTableMap::COL_RANGENAME, WeaponDescriptionTableMap::COL_AMMO, WeaponDescriptionTableMap::COL_RELOADTIME, ),
        self::TYPE_FIELDNAME     => array('weaponName', 'rangeName', 'ammo', 'reloadtime', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('WeaponName' => 0, 'Rangename' => 1, 'Ammo' => 2, 'Reloadtime' => 3, ),
        self::TYPE_CAMELNAME     => array('weaponName' => 0, 'rangename' => 1, 'ammo' => 2, 'reloadtime' => 3, ),
        self::TYPE_COLNAME       => array(WeaponDescriptionTableMap::COL_WEAPONNAME => 0, WeaponDescriptionTableMap::COL_RANGENAME => 1, WeaponDescriptionTableMap::COL_AMMO => 2, WeaponDescriptionTableMap::COL_RELOADTIME => 3, ),
        self::TYPE_FIELDNAME     => array('weaponName' => 0, 'rangeName' => 1, 'ammo' => 2, 'reloadtime' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('weapondescription');
        $this->setPhpName('WeaponDescription');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Persistence\\WeaponDescriptionPersistence\\WeaponDescription');
        $this->setPackage('Persistence\WeaponDescriptionPersistence');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('weaponName', 'WeaponName', 'VARCHAR', true, 30, null);
        $this->addColumn('rangeName', 'Rangename', 'VARCHAR', true, 30, null);
        $this->addColumn('ammo', 'Ammo', 'INTEGER', true, null, null);
        $this->addColumn('reloadtime', 'Reloadtime', 'INTEGER', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ShipDescriptionRelatedByWeapon1', '\\Persistence\\ShipDescriptionPersistence\\ShipDescription', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':weapon1',
    1 => ':weaponName',
  ),
), null, null, 'ShipDescriptionsRelatedByWeapon1', false);
        $this->addRelation('ShipDescriptionRelatedByWeapon2', '\\Persistence\\ShipDescriptionPersistence\\ShipDescription', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':weapon2',
    1 => ':weaponName',
  ),
), null, null, 'ShipDescriptionsRelatedByWeapon2', false);
        $this->addRelation('ShipDescriptionRelatedByWeapon3', '\\Persistence\\ShipDescriptionPersistence\\ShipDescription', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':weapon3',
    1 => ':weaponName',
  ),
), null, null, 'ShipDescriptionsRelatedByWeapon3', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('WeaponName', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('WeaponName', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('WeaponName', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('WeaponName', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('WeaponName', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('WeaponName', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('WeaponName', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? WeaponDescriptionTableMap::CLASS_DEFAULT : WeaponDescriptionTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (WeaponDescription object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = WeaponDescriptionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = WeaponDescriptionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + WeaponDescriptionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WeaponDescriptionTableMap::OM_CLASS;
            /** @var WeaponDescription $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            WeaponDescriptionTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = WeaponDescriptionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = WeaponDescriptionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var WeaponDescription $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WeaponDescriptionTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(WeaponDescriptionTableMap::COL_WEAPONNAME);
            $criteria->addSelectColumn(WeaponDescriptionTableMap::COL_RANGENAME);
            $criteria->addSelectColumn(WeaponDescriptionTableMap::COL_AMMO);
            $criteria->addSelectColumn(WeaponDescriptionTableMap::COL_RELOADTIME);
        } else {
            $criteria->addSelectColumn($alias . '.weaponName');
            $criteria->addSelectColumn($alias . '.rangeName');
            $criteria->addSelectColumn($alias . '.ammo');
            $criteria->addSelectColumn($alias . '.reloadtime');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(WeaponDescriptionTableMap::DATABASE_NAME)->getTable(WeaponDescriptionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(WeaponDescriptionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(WeaponDescriptionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new WeaponDescriptionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a WeaponDescription or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or WeaponDescription object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WeaponDescriptionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Persistence\WeaponDescriptionPersistence\WeaponDescription) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WeaponDescriptionTableMap::DATABASE_NAME);
            $criteria->add(WeaponDescriptionTableMap::COL_WEAPONNAME, (array) $values, Criteria::IN);
        }

        $query = WeaponDescriptionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            WeaponDescriptionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                WeaponDescriptionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the weapondescription table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return WeaponDescriptionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a WeaponDescription or Criteria object.
     *
     * @param mixed               $criteria Criteria or WeaponDescription object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WeaponDescriptionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from WeaponDescription object
        }


        // Set the correct dbName
        $query = WeaponDescriptionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // WeaponDescriptionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
WeaponDescriptionTableMap::buildTableMap();
