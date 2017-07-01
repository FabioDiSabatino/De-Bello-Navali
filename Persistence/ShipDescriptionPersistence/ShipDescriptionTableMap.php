<?php

namespace Persistence\ShipDescriptionPersistence\Map;

use Persistence\ShipDescriptionPersistence\ShipDescription;
use Persistence\ShipDescriptionPersistence\ShipDescriptionQuery;
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
 * This class defines the structure of the 'shipDescription' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ShipDescriptionTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Persistence.ShipDescriptionPersistence.Map.ShipDescriptionTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'shipDescription';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Persistence\\ShipDescriptionPersistence\\ShipDescription';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Persistence.ShipDescriptionPersistence.ShipDescription';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the civilization field
     */
    const COL_CIVILIZATION = 'shipDescription.civilization';

    /**
     * the column name for the dimension field
     */
    const COL_DIMENSION = 'shipDescription.dimension';

    /**
     * the column name for the shipName field
     */
    const COL_SHIPNAME = 'shipDescription.shipName';

    /**
     * the column name for the shipWeight field
     */
    const COL_SHIPWEIGHT = 'shipDescription.shipWeight';

    /**
     * the column name for the weapon1 field
     */
    const COL_WEAPON1 = 'shipDescription.weapon1';

    /**
     * the column name for the weapon2 field
     */
    const COL_WEAPON2 = 'shipDescription.weapon2';

    /**
     * the column name for the weapon3 field
     */
    const COL_WEAPON3 = 'shipDescription.weapon3';

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
        self::TYPE_PHPNAME       => array('Civilization', 'Dimension', 'ShipName', 'ShipWeight', 'Weapon1', 'Weapon2', 'Weapon3', ),
        self::TYPE_CAMELNAME     => array('civilization', 'dimension', 'shipName', 'shipWeight', 'weapon1', 'weapon2', 'weapon3', ),
        self::TYPE_COLNAME       => array(ShipDescriptionTableMap::COL_CIVILIZATION, ShipDescriptionTableMap::COL_DIMENSION, ShipDescriptionTableMap::COL_SHIPNAME, ShipDescriptionTableMap::COL_SHIPWEIGHT, ShipDescriptionTableMap::COL_WEAPON1, ShipDescriptionTableMap::COL_WEAPON2, ShipDescriptionTableMap::COL_WEAPON3, ),
        self::TYPE_FIELDNAME     => array('civilization', 'dimension', 'shipName', 'shipWeight', 'weapon1', 'weapon2', 'weapon3', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Civilization' => 0, 'Dimension' => 1, 'ShipName' => 2, 'ShipWeight' => 3, 'Weapon1' => 4, 'Weapon2' => 5, 'Weapon3' => 6, ),
        self::TYPE_CAMELNAME     => array('civilization' => 0, 'dimension' => 1, 'shipName' => 2, 'shipWeight' => 3, 'weapon1' => 4, 'weapon2' => 5, 'weapon3' => 6, ),
        self::TYPE_COLNAME       => array(ShipDescriptionTableMap::COL_CIVILIZATION => 0, ShipDescriptionTableMap::COL_DIMENSION => 1, ShipDescriptionTableMap::COL_SHIPNAME => 2, ShipDescriptionTableMap::COL_SHIPWEIGHT => 3, ShipDescriptionTableMap::COL_WEAPON1 => 4, ShipDescriptionTableMap::COL_WEAPON2 => 5, ShipDescriptionTableMap::COL_WEAPON3 => 6, ),
        self::TYPE_FIELDNAME     => array('civilization' => 0, 'dimension' => 1, 'shipName' => 2, 'shipWeight' => 3, 'weapon1' => 4, 'weapon2' => 5, 'weapon3' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('shipDescription');
        $this->setPhpName('ShipDescription');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Persistence\\ShipDescriptionPersistence\\ShipDescription');
        $this->setPackage('Persistence.ShipDescriptionPersistence');
        $this->setUseIdGenerator(false);
        $this->setIsCrossRef(true);
        // columns
        $this->addPrimaryKey('civilization', 'Civilization', 'VARCHAR', true, 255, null);
        $this->addPrimaryKey('dimension', 'Dimension', 'INTEGER', true, null, null);
        $this->addColumn('shipName', 'ShipName', 'VARCHAR', true, 255, null);
        $this->addColumn('shipWeight', 'ShipWeight', 'VARCHAR', true, 255, null);
        $this->addForeignKey('weapon1', 'Weapon1', 'VARCHAR', 'weaponDescription', 'weaponName', true, 255, null);
        $this->addForeignKey('weapon2', 'Weapon2', 'VARCHAR', 'weaponDescription', 'weaponName', false, 255, null);
        $this->addForeignKey('weapon3', 'Weapon3', 'VARCHAR', 'weaponDescription', 'weaponName', false, 255, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('WeaponDescriptionRelatedByWeapon1', '\\Persistence\\WeaponDescriptionPersistence\\WeaponDescription', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':weapon1',
    1 => ':weaponName',
  ),
), null, null, null, false);
        $this->addRelation('WeaponDescriptionRelatedByWeapon2', '\\Persistence\\WeaponDescriptionPersistence\\WeaponDescription', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':weapon2',
    1 => ':weaponName',
  ),
), null, null, null, false);
        $this->addRelation('WeaponDescriptionRelatedByWeapon3', '\\Persistence\\WeaponDescriptionPersistence\\WeaponDescription', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':weapon3',
    1 => ':weaponName',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Persistence\ShipDescriptionPersistence\ShipDescription $obj A \Persistence\ShipDescriptionPersistence\ShipDescription object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getCivilization() || is_scalar($obj->getCivilization()) || is_callable([$obj->getCivilization(), '__toString']) ? (string) $obj->getCivilization() : $obj->getCivilization()), (null === $obj->getDimension() || is_scalar($obj->getDimension()) || is_callable([$obj->getDimension(), '__toString']) ? (string) $obj->getDimension() : $obj->getDimension())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \Persistence\ShipDescriptionPersistence\ShipDescription object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Persistence\ShipDescriptionPersistence\ShipDescription) {
                $key = serialize([(null === $value->getCivilization() || is_scalar($value->getCivilization()) || is_callable([$value->getCivilization(), '__toString']) ? (string) $value->getCivilization() : $value->getCivilization()), (null === $value->getDimension() || is_scalar($value->getDimension()) || is_callable([$value->getDimension(), '__toString']) ? (string) $value->getDimension() : $value->getDimension())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Persistence\ShipDescriptionPersistence\ShipDescription object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Civilization', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Dimension', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Civilization', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Civilization', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Civilization', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Civilization', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Civilization', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Dimension', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Dimension', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Dimension', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Dimension', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('Dimension', TableMap::TYPE_PHPNAME, $indexType)])]);
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
            $pks = [];
            
        $pks[] = (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Civilization', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('Dimension', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
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
        return $withPrefix ? ShipDescriptionTableMap::CLASS_DEFAULT : ShipDescriptionTableMap::OM_CLASS;
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
     * @return array           (ShipDescription object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ShipDescriptionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ShipDescriptionTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ShipDescriptionTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ShipDescriptionTableMap::OM_CLASS;
            /** @var ShipDescription $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ShipDescriptionTableMap::addInstanceToPool($obj, $key);
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
            $key = ShipDescriptionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ShipDescriptionTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ShipDescription $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ShipDescriptionTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ShipDescriptionTableMap::COL_CIVILIZATION);
            $criteria->addSelectColumn(ShipDescriptionTableMap::COL_DIMENSION);
            $criteria->addSelectColumn(ShipDescriptionTableMap::COL_SHIPNAME);
            $criteria->addSelectColumn(ShipDescriptionTableMap::COL_SHIPWEIGHT);
            $criteria->addSelectColumn(ShipDescriptionTableMap::COL_WEAPON1);
            $criteria->addSelectColumn(ShipDescriptionTableMap::COL_WEAPON2);
            $criteria->addSelectColumn(ShipDescriptionTableMap::COL_WEAPON3);
        } else {
            $criteria->addSelectColumn($alias . '.civilization');
            $criteria->addSelectColumn($alias . '.dimension');
            $criteria->addSelectColumn($alias . '.shipName');
            $criteria->addSelectColumn($alias . '.shipWeight');
            $criteria->addSelectColumn($alias . '.weapon1');
            $criteria->addSelectColumn($alias . '.weapon2');
            $criteria->addSelectColumn($alias . '.weapon3');
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
        return Propel::getServiceContainer()->getDatabaseMap(ShipDescriptionTableMap::DATABASE_NAME)->getTable(ShipDescriptionTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ShipDescriptionTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ShipDescriptionTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ShipDescriptionTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ShipDescription or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ShipDescription object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ShipDescriptionTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Persistence\ShipDescriptionPersistence\ShipDescription) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ShipDescriptionTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(ShipDescriptionTableMap::COL_CIVILIZATION, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(ShipDescriptionTableMap::COL_DIMENSION, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = ShipDescriptionQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ShipDescriptionTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ShipDescriptionTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the shipDescription table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ShipDescriptionQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ShipDescription or Criteria object.
     *
     * @param mixed               $criteria Criteria or ShipDescription object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ShipDescriptionTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ShipDescription object
        }


        // Set the correct dbName
        $query = ShipDescriptionQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ShipDescriptionTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ShipDescriptionTableMap::buildTableMap();