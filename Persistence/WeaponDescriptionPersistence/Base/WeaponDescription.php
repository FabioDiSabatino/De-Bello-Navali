<?php

namespace Persistence\WeaponDescriptionPersistence\Base;

use \Exception;
use \PDO;
use Persistence\ShipDescriptionPersistence\ShipDescription;
use Persistence\ShipDescriptionPersistence\ShipDescriptionQuery;
use Persistence\ShipDescriptionPersistence\Base\ShipDescription as BaseShipDescription;
use Persistence\ShipDescriptionPersistence\Map\ShipDescriptionTableMap;
use Persistence\WeaponDescriptionPersistence\WeaponDescription as ChildWeaponDescription;
use Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery as ChildWeaponDescriptionQuery;
use Persistence\WeaponDescriptionPersistence\Map\WeaponDescriptionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'weapondescription' table.
 *
 *
 *
 * @package    propel.generator.Persistence\WeaponDescriptionPersistence.Base
 */
abstract class WeaponDescription implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Persistence\\WeaponDescriptionPersistence\\Map\\WeaponDescriptionTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the weaponname field.
     *
     * @var        string
     */
    protected $weaponname;

    /**
     * The value for the rangename field.
     *
     * @var        string
     */
    protected $rangename;

    /**
     * The value for the ammo field.
     *
     * @var        int
     */
    protected $ammo;

    /**
     * The value for the reloadtime field.
     *
     * @var        int
     */
    protected $reloadtime;

    /**
     * @var        ObjectCollection|ShipDescription[] Collection to store aggregation of ShipDescription objects.
     */
    protected $collShipDescriptionsRelatedByWeapon1;
    protected $collShipDescriptionsRelatedByWeapon1Partial;

    /**
     * @var        ObjectCollection|ShipDescription[] Collection to store aggregation of ShipDescription objects.
     */
    protected $collShipDescriptionsRelatedByWeapon2;
    protected $collShipDescriptionsRelatedByWeapon2Partial;

    /**
     * @var        ObjectCollection|ShipDescription[] Collection to store aggregation of ShipDescription objects.
     */
    protected $collShipDescriptionsRelatedByWeapon3;
    protected $collShipDescriptionsRelatedByWeapon3Partial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ShipDescription[]
     */
    protected $shipDescriptionsRelatedByWeapon1ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ShipDescription[]
     */
    protected $shipDescriptionsRelatedByWeapon2ScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ShipDescription[]
     */
    protected $shipDescriptionsRelatedByWeapon3ScheduledForDeletion = null;

    /**
     * Initializes internal state of Persistence\WeaponDescriptionPersistence\Base\WeaponDescription object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>WeaponDescription</code> instance.  If
     * <code>obj</code> is an instance of <code>WeaponDescription</code>, delegates to
     * <code>equals(WeaponDescription)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|WeaponDescription The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [weaponname] column value.
     *
     * @return string
     */
    public function getWeaponName()
    {
        return $this->weaponname;
    }

    /**
     * Get the [rangename] column value.
     *
     * @return string
     */
    public function getRangename()
    {
        return $this->rangename;
    }

    /**
     * Get the [ammo] column value.
     *
     * @return int
     */
    public function getAmmo()
    {
        return $this->ammo;
    }

    /**
     * Get the [reloadtime] column value.
     *
     * @return int
     */
    public function getReloadtime()
    {
        return $this->reloadtime;
    }

    /**
     * Set the value of [weaponname] column.
     *
     * @param string $v new value
     * @return $this|\Persistence\WeaponDescriptionPersistence\WeaponDescription The current object (for fluent API support)
     */
    public function setWeaponName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->weaponname !== $v) {
            $this->weaponname = $v;
            $this->modifiedColumns[WeaponDescriptionTableMap::COL_WEAPONNAME] = true;
        }

        return $this;
    } // setWeaponName()

    /**
     * Set the value of [rangename] column.
     *
     * @param string $v new value
     * @return $this|\Persistence\WeaponDescriptionPersistence\WeaponDescription The current object (for fluent API support)
     */
    public function setRangename($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->rangename !== $v) {
            $this->rangename = $v;
            $this->modifiedColumns[WeaponDescriptionTableMap::COL_RANGENAME] = true;
        }

        return $this;
    } // setRangename()

    /**
     * Set the value of [ammo] column.
     *
     * @param int $v new value
     * @return $this|\Persistence\WeaponDescriptionPersistence\WeaponDescription The current object (for fluent API support)
     */
    public function setAmmo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ammo !== $v) {
            $this->ammo = $v;
            $this->modifiedColumns[WeaponDescriptionTableMap::COL_AMMO] = true;
        }

        return $this;
    } // setAmmo()

    /**
     * Set the value of [reloadtime] column.
     *
     * @param int $v new value
     * @return $this|\Persistence\WeaponDescriptionPersistence\WeaponDescription The current object (for fluent API support)
     */
    public function setReloadtime($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reloadtime !== $v) {
            $this->reloadtime = $v;
            $this->modifiedColumns[WeaponDescriptionTableMap::COL_RELOADTIME] = true;
        }

        return $this;
    } // setReloadtime()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : WeaponDescriptionTableMap::translateFieldName('WeaponName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->weaponname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : WeaponDescriptionTableMap::translateFieldName('Rangename', TableMap::TYPE_PHPNAME, $indexType)];
            $this->rangename = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : WeaponDescriptionTableMap::translateFieldName('Ammo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->ammo = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : WeaponDescriptionTableMap::translateFieldName('Reloadtime', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reloadtime = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 4; // 4 = WeaponDescriptionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Persistence\\WeaponDescriptionPersistence\\WeaponDescription'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WeaponDescriptionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildWeaponDescriptionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collShipDescriptionsRelatedByWeapon1 = null;

            $this->collShipDescriptionsRelatedByWeapon2 = null;

            $this->collShipDescriptionsRelatedByWeapon3 = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see WeaponDescription::setDeleted()
     * @see WeaponDescription::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(WeaponDescriptionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildWeaponDescriptionQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(WeaponDescriptionTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                WeaponDescriptionTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion !== null) {
                if (!$this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion->isEmpty()) {
                    foreach ($this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion as $shipDescriptionRelatedByWeapon1) {
                        // need to save related object because we set the relation to null
                        $shipDescriptionRelatedByWeapon1->save($con);
                    }
                    $this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion = null;
                }
            }

            if ($this->collShipDescriptionsRelatedByWeapon1 !== null) {
                foreach ($this->collShipDescriptionsRelatedByWeapon1 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion !== null) {
                if (!$this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion->isEmpty()) {
                    foreach ($this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion as $shipDescriptionRelatedByWeapon2) {
                        // need to save related object because we set the relation to null
                        $shipDescriptionRelatedByWeapon2->save($con);
                    }
                    $this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion = null;
                }
            }

            if ($this->collShipDescriptionsRelatedByWeapon2 !== null) {
                foreach ($this->collShipDescriptionsRelatedByWeapon2 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion !== null) {
                if (!$this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion->isEmpty()) {
                    foreach ($this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion as $shipDescriptionRelatedByWeapon3) {
                        // need to save related object because we set the relation to null
                        $shipDescriptionRelatedByWeapon3->save($con);
                    }
                    $this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion = null;
                }
            }

            if ($this->collShipDescriptionsRelatedByWeapon3 !== null) {
                foreach ($this->collShipDescriptionsRelatedByWeapon3 as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(WeaponDescriptionTableMap::COL_WEAPONNAME)) {
            $modifiedColumns[':p' . $index++]  = 'weaponName';
        }
        if ($this->isColumnModified(WeaponDescriptionTableMap::COL_RANGENAME)) {
            $modifiedColumns[':p' . $index++]  = 'rangeName';
        }
        if ($this->isColumnModified(WeaponDescriptionTableMap::COL_AMMO)) {
            $modifiedColumns[':p' . $index++]  = 'ammo';
        }
        if ($this->isColumnModified(WeaponDescriptionTableMap::COL_RELOADTIME)) {
            $modifiedColumns[':p' . $index++]  = 'reloadtime';
        }

        $sql = sprintf(
            'INSERT INTO weapondescription (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'weaponName':
                        $stmt->bindValue($identifier, $this->weaponname, PDO::PARAM_STR);
                        break;
                    case 'rangeName':
                        $stmt->bindValue($identifier, $this->rangename, PDO::PARAM_STR);
                        break;
                    case 'ammo':
                        $stmt->bindValue($identifier, $this->ammo, PDO::PARAM_INT);
                        break;
                    case 'reloadtime':
                        $stmt->bindValue($identifier, $this->reloadtime, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = WeaponDescriptionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getWeaponName();
                break;
            case 1:
                return $this->getRangename();
                break;
            case 2:
                return $this->getAmmo();
                break;
            case 3:
                return $this->getReloadtime();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['WeaponDescription'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['WeaponDescription'][$this->hashCode()] = true;
        $keys = WeaponDescriptionTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getWeaponName(),
            $keys[1] => $this->getRangename(),
            $keys[2] => $this->getAmmo(),
            $keys[3] => $this->getReloadtime(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collShipDescriptionsRelatedByWeapon1) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'shipDescriptions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ShipDescriptions';
                        break;
                    default:
                        $key = 'ShipDescriptions';
                }

                $result[$key] = $this->collShipDescriptionsRelatedByWeapon1->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collShipDescriptionsRelatedByWeapon2) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'shipDescriptions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ShipDescriptions';
                        break;
                    default:
                        $key = 'ShipDescriptions';
                }

                $result[$key] = $this->collShipDescriptionsRelatedByWeapon2->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collShipDescriptionsRelatedByWeapon3) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'shipDescriptions';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'ShipDescriptions';
                        break;
                    default:
                        $key = 'ShipDescriptions';
                }

                $result[$key] = $this->collShipDescriptionsRelatedByWeapon3->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Persistence\WeaponDescriptionPersistence\WeaponDescription
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = WeaponDescriptionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Persistence\WeaponDescriptionPersistence\WeaponDescription
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setWeaponName($value);
                break;
            case 1:
                $this->setRangename($value);
                break;
            case 2:
                $this->setAmmo($value);
                break;
            case 3:
                $this->setReloadtime($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = WeaponDescriptionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setWeaponName($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setRangename($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setAmmo($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setReloadtime($arr[$keys[3]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Persistence\WeaponDescriptionPersistence\WeaponDescription The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(WeaponDescriptionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(WeaponDescriptionTableMap::COL_WEAPONNAME)) {
            $criteria->add(WeaponDescriptionTableMap::COL_WEAPONNAME, $this->weaponname);
        }
        if ($this->isColumnModified(WeaponDescriptionTableMap::COL_RANGENAME)) {
            $criteria->add(WeaponDescriptionTableMap::COL_RANGENAME, $this->rangename);
        }
        if ($this->isColumnModified(WeaponDescriptionTableMap::COL_AMMO)) {
            $criteria->add(WeaponDescriptionTableMap::COL_AMMO, $this->ammo);
        }
        if ($this->isColumnModified(WeaponDescriptionTableMap::COL_RELOADTIME)) {
            $criteria->add(WeaponDescriptionTableMap::COL_RELOADTIME, $this->reloadtime);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildWeaponDescriptionQuery::create();
        $criteria->add(WeaponDescriptionTableMap::COL_WEAPONNAME, $this->weaponname);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getWeaponName();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getWeaponName();
    }

    /**
     * Generic method to set the primary key (weaponname column).
     *
     * @param       string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setWeaponName($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getWeaponName();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Persistence\WeaponDescriptionPersistence\WeaponDescription (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setWeaponName($this->getWeaponName());
        $copyObj->setRangename($this->getRangename());
        $copyObj->setAmmo($this->getAmmo());
        $copyObj->setReloadtime($this->getReloadtime());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getShipDescriptionsRelatedByWeapon1() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addShipDescriptionRelatedByWeapon1($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getShipDescriptionsRelatedByWeapon2() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addShipDescriptionRelatedByWeapon2($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getShipDescriptionsRelatedByWeapon3() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addShipDescriptionRelatedByWeapon3($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Persistence\WeaponDescriptionPersistence\WeaponDescription Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('ShipDescriptionRelatedByWeapon1' == $relationName) {
            $this->initShipDescriptionsRelatedByWeapon1();
            return;
        }
        if ('ShipDescriptionRelatedByWeapon2' == $relationName) {
            $this->initShipDescriptionsRelatedByWeapon2();
            return;
        }
        if ('ShipDescriptionRelatedByWeapon3' == $relationName) {
            $this->initShipDescriptionsRelatedByWeapon3();
            return;
        }
    }

    /**
     * Clears out the collShipDescriptionsRelatedByWeapon1 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addShipDescriptionsRelatedByWeapon1()
     */
    public function clearShipDescriptionsRelatedByWeapon1()
    {
        $this->collShipDescriptionsRelatedByWeapon1 = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collShipDescriptionsRelatedByWeapon1 collection loaded partially.
     */
    public function resetPartialShipDescriptionsRelatedByWeapon1($v = true)
    {
        $this->collShipDescriptionsRelatedByWeapon1Partial = $v;
    }

    /**
     * Initializes the collShipDescriptionsRelatedByWeapon1 collection.
     *
     * By default this just sets the collShipDescriptionsRelatedByWeapon1 collection to an empty array (like clearcollShipDescriptionsRelatedByWeapon1());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initShipDescriptionsRelatedByWeapon1($overrideExisting = true)
    {
        if (null !== $this->collShipDescriptionsRelatedByWeapon1 && !$overrideExisting) {
            return;
        }

        $collectionClassName = ShipDescriptionTableMap::getTableMap()->getCollectionClassName();

        $this->collShipDescriptionsRelatedByWeapon1 = new $collectionClassName;
        $this->collShipDescriptionsRelatedByWeapon1->setModel('\Persistence\ShipDescriptionPersistence\ShipDescription');
    }

    /**
     * Gets an array of ShipDescription objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildWeaponDescription is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ShipDescription[] List of ShipDescription objects
     * @throws PropelException
     */
    public function getShipDescriptionsRelatedByWeapon1(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collShipDescriptionsRelatedByWeapon1Partial && !$this->isNew();
        if (null === $this->collShipDescriptionsRelatedByWeapon1 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collShipDescriptionsRelatedByWeapon1) {
                // return empty collection
                $this->initShipDescriptionsRelatedByWeapon1();
            } else {
                $collShipDescriptionsRelatedByWeapon1 = ShipDescriptionQuery::create(null, $criteria)
                    ->filterByFirstWeapon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collShipDescriptionsRelatedByWeapon1Partial && count($collShipDescriptionsRelatedByWeapon1)) {
                        $this->initShipDescriptionsRelatedByWeapon1(false);

                        foreach ($collShipDescriptionsRelatedByWeapon1 as $obj) {
                            if (false == $this->collShipDescriptionsRelatedByWeapon1->contains($obj)) {
                                $this->collShipDescriptionsRelatedByWeapon1->append($obj);
                            }
                        }

                        $this->collShipDescriptionsRelatedByWeapon1Partial = true;
                    }

                    return $collShipDescriptionsRelatedByWeapon1;
                }

                if ($partial && $this->collShipDescriptionsRelatedByWeapon1) {
                    foreach ($this->collShipDescriptionsRelatedByWeapon1 as $obj) {
                        if ($obj->isNew()) {
                            $collShipDescriptionsRelatedByWeapon1[] = $obj;
                        }
                    }
                }

                $this->collShipDescriptionsRelatedByWeapon1 = $collShipDescriptionsRelatedByWeapon1;
                $this->collShipDescriptionsRelatedByWeapon1Partial = false;
            }
        }

        return $this->collShipDescriptionsRelatedByWeapon1;
    }

    /**
     * Sets a collection of ShipDescription objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $shipDescriptionsRelatedByWeapon1 A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildWeaponDescription The current object (for fluent API support)
     */
    public function setShipDescriptionsRelatedByWeapon1(Collection $shipDescriptionsRelatedByWeapon1, ConnectionInterface $con = null)
    {
        /** @var ShipDescription[] $shipDescriptionsRelatedByWeapon1ToDelete */
        $shipDescriptionsRelatedByWeapon1ToDelete = $this->getShipDescriptionsRelatedByWeapon1(new Criteria(), $con)->diff($shipDescriptionsRelatedByWeapon1);


        $this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion = $shipDescriptionsRelatedByWeapon1ToDelete;

        foreach ($shipDescriptionsRelatedByWeapon1ToDelete as $shipDescriptionRelatedByWeapon1Removed) {
            $shipDescriptionRelatedByWeapon1Removed->setFirstWeapon(null);
        }

        $this->collShipDescriptionsRelatedByWeapon1 = null;
        foreach ($shipDescriptionsRelatedByWeapon1 as $shipDescriptionRelatedByWeapon1) {
            $this->addShipDescriptionRelatedByWeapon1($shipDescriptionRelatedByWeapon1);
        }

        $this->collShipDescriptionsRelatedByWeapon1 = $shipDescriptionsRelatedByWeapon1;
        $this->collShipDescriptionsRelatedByWeapon1Partial = false;

        return $this;
    }

    /**
     * Returns the number of related BaseShipDescription objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related BaseShipDescription objects.
     * @throws PropelException
     */
    public function countShipDescriptionsRelatedByWeapon1(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collShipDescriptionsRelatedByWeapon1Partial && !$this->isNew();
        if (null === $this->collShipDescriptionsRelatedByWeapon1 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collShipDescriptionsRelatedByWeapon1) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getShipDescriptionsRelatedByWeapon1());
            }

            $query = ShipDescriptionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByFirstWeapon($this)
                ->count($con);
        }

        return count($this->collShipDescriptionsRelatedByWeapon1);
    }

    /**
     * Method called to associate a ShipDescription object to this object
     * through the ShipDescription foreign key attribute.
     *
     * @param  ShipDescription $l ShipDescription
     * @return $this|\Persistence\WeaponDescriptionPersistence\WeaponDescription The current object (for fluent API support)
     */
    public function addShipDescriptionRelatedByWeapon1(ShipDescription $l)
    {
        if ($this->collShipDescriptionsRelatedByWeapon1 === null) {
            $this->initShipDescriptionsRelatedByWeapon1();
            $this->collShipDescriptionsRelatedByWeapon1Partial = true;
        }

        if (!$this->collShipDescriptionsRelatedByWeapon1->contains($l)) {
            $this->doAddShipDescriptionRelatedByWeapon1($l);

            if ($this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion and $this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion->contains($l)) {
                $this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion->remove($this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ShipDescription $shipDescriptionRelatedByWeapon1 The ShipDescription object to add.
     */
    protected function doAddShipDescriptionRelatedByWeapon1(ShipDescription $shipDescriptionRelatedByWeapon1)
    {
        $this->collShipDescriptionsRelatedByWeapon1[]= $shipDescriptionRelatedByWeapon1;
        $shipDescriptionRelatedByWeapon1->setFirstWeapon($this);
    }

    /**
     * @param  ShipDescription $shipDescriptionRelatedByWeapon1 The ShipDescription object to remove.
     * @return $this|ChildWeaponDescription The current object (for fluent API support)
     */
    public function removeShipDescriptionRelatedByWeapon1(ShipDescription $shipDescriptionRelatedByWeapon1)
    {
        if ($this->getShipDescriptionsRelatedByWeapon1()->contains($shipDescriptionRelatedByWeapon1)) {
            $pos = $this->collShipDescriptionsRelatedByWeapon1->search($shipDescriptionRelatedByWeapon1);
            $this->collShipDescriptionsRelatedByWeapon1->remove($pos);
            if (null === $this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion) {
                $this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion = clone $this->collShipDescriptionsRelatedByWeapon1;
                $this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion->clear();
            }
            $this->shipDescriptionsRelatedByWeapon1ScheduledForDeletion[]= $shipDescriptionRelatedByWeapon1;
            $shipDescriptionRelatedByWeapon1->setFirstWeapon(null);
        }

        return $this;
    }

    /**
     * Clears out the collShipDescriptionsRelatedByWeapon2 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addShipDescriptionsRelatedByWeapon2()
     */
    public function clearShipDescriptionsRelatedByWeapon2()
    {
        $this->collShipDescriptionsRelatedByWeapon2 = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collShipDescriptionsRelatedByWeapon2 collection loaded partially.
     */
    public function resetPartialShipDescriptionsRelatedByWeapon2($v = true)
    {
        $this->collShipDescriptionsRelatedByWeapon2Partial = $v;
    }

    /**
     * Initializes the collShipDescriptionsRelatedByWeapon2 collection.
     *
     * By default this just sets the collShipDescriptionsRelatedByWeapon2 collection to an empty array (like clearcollShipDescriptionsRelatedByWeapon2());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initShipDescriptionsRelatedByWeapon2($overrideExisting = true)
    {
        if (null !== $this->collShipDescriptionsRelatedByWeapon2 && !$overrideExisting) {
            return;
        }

        $collectionClassName = ShipDescriptionTableMap::getTableMap()->getCollectionClassName();

        $this->collShipDescriptionsRelatedByWeapon2 = new $collectionClassName;
        $this->collShipDescriptionsRelatedByWeapon2->setModel('\Persistence\ShipDescriptionPersistence\ShipDescription');
    }

    /**
     * Gets an array of ShipDescription objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildWeaponDescription is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ShipDescription[] List of ShipDescription objects
     * @throws PropelException
     */
    public function getShipDescriptionsRelatedByWeapon2(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collShipDescriptionsRelatedByWeapon2Partial && !$this->isNew();
        if (null === $this->collShipDescriptionsRelatedByWeapon2 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collShipDescriptionsRelatedByWeapon2) {
                // return empty collection
                $this->initShipDescriptionsRelatedByWeapon2();
            } else {
                $collShipDescriptionsRelatedByWeapon2 = ShipDescriptionQuery::create(null, $criteria)
                    ->filterBySecondWeapon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collShipDescriptionsRelatedByWeapon2Partial && count($collShipDescriptionsRelatedByWeapon2)) {
                        $this->initShipDescriptionsRelatedByWeapon2(false);

                        foreach ($collShipDescriptionsRelatedByWeapon2 as $obj) {
                            if (false == $this->collShipDescriptionsRelatedByWeapon2->contains($obj)) {
                                $this->collShipDescriptionsRelatedByWeapon2->append($obj);
                            }
                        }

                        $this->collShipDescriptionsRelatedByWeapon2Partial = true;
                    }

                    return $collShipDescriptionsRelatedByWeapon2;
                }

                if ($partial && $this->collShipDescriptionsRelatedByWeapon2) {
                    foreach ($this->collShipDescriptionsRelatedByWeapon2 as $obj) {
                        if ($obj->isNew()) {
                            $collShipDescriptionsRelatedByWeapon2[] = $obj;
                        }
                    }
                }

                $this->collShipDescriptionsRelatedByWeapon2 = $collShipDescriptionsRelatedByWeapon2;
                $this->collShipDescriptionsRelatedByWeapon2Partial = false;
            }
        }

        return $this->collShipDescriptionsRelatedByWeapon2;
    }

    /**
     * Sets a collection of ShipDescription objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $shipDescriptionsRelatedByWeapon2 A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildWeaponDescription The current object (for fluent API support)
     */
    public function setShipDescriptionsRelatedByWeapon2(Collection $shipDescriptionsRelatedByWeapon2, ConnectionInterface $con = null)
    {
        /** @var ShipDescription[] $shipDescriptionsRelatedByWeapon2ToDelete */
        $shipDescriptionsRelatedByWeapon2ToDelete = $this->getShipDescriptionsRelatedByWeapon2(new Criteria(), $con)->diff($shipDescriptionsRelatedByWeapon2);


        $this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion = $shipDescriptionsRelatedByWeapon2ToDelete;

        foreach ($shipDescriptionsRelatedByWeapon2ToDelete as $shipDescriptionRelatedByWeapon2Removed) {
            $shipDescriptionRelatedByWeapon2Removed->setSecondWeapon(null);
        }

        $this->collShipDescriptionsRelatedByWeapon2 = null;
        foreach ($shipDescriptionsRelatedByWeapon2 as $shipDescriptionRelatedByWeapon2) {
            $this->addShipDescriptionRelatedByWeapon2($shipDescriptionRelatedByWeapon2);
        }

        $this->collShipDescriptionsRelatedByWeapon2 = $shipDescriptionsRelatedByWeapon2;
        $this->collShipDescriptionsRelatedByWeapon2Partial = false;

        return $this;
    }

    /**
     * Returns the number of related BaseShipDescription objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related BaseShipDescription objects.
     * @throws PropelException
     */
    public function countShipDescriptionsRelatedByWeapon2(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collShipDescriptionsRelatedByWeapon2Partial && !$this->isNew();
        if (null === $this->collShipDescriptionsRelatedByWeapon2 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collShipDescriptionsRelatedByWeapon2) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getShipDescriptionsRelatedByWeapon2());
            }

            $query = ShipDescriptionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySecondWeapon($this)
                ->count($con);
        }

        return count($this->collShipDescriptionsRelatedByWeapon2);
    }

    /**
     * Method called to associate a ShipDescription object to this object
     * through the ShipDescription foreign key attribute.
     *
     * @param  ShipDescription $l ShipDescription
     * @return $this|\Persistence\WeaponDescriptionPersistence\WeaponDescription The current object (for fluent API support)
     */
    public function addShipDescriptionRelatedByWeapon2(ShipDescription $l)
    {
        if ($this->collShipDescriptionsRelatedByWeapon2 === null) {
            $this->initShipDescriptionsRelatedByWeapon2();
            $this->collShipDescriptionsRelatedByWeapon2Partial = true;
        }

        if (!$this->collShipDescriptionsRelatedByWeapon2->contains($l)) {
            $this->doAddShipDescriptionRelatedByWeapon2($l);

            if ($this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion and $this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion->contains($l)) {
                $this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion->remove($this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ShipDescription $shipDescriptionRelatedByWeapon2 The ShipDescription object to add.
     */
    protected function doAddShipDescriptionRelatedByWeapon2(ShipDescription $shipDescriptionRelatedByWeapon2)
    {
        $this->collShipDescriptionsRelatedByWeapon2[]= $shipDescriptionRelatedByWeapon2;
        $shipDescriptionRelatedByWeapon2->setSecondWeapon($this);
    }

    /**
     * @param  ShipDescription $shipDescriptionRelatedByWeapon2 The ShipDescription object to remove.
     * @return $this|ChildWeaponDescription The current object (for fluent API support)
     */
    public function removeShipDescriptionRelatedByWeapon2(ShipDescription $shipDescriptionRelatedByWeapon2)
    {
        if ($this->getShipDescriptionsRelatedByWeapon2()->contains($shipDescriptionRelatedByWeapon2)) {
            $pos = $this->collShipDescriptionsRelatedByWeapon2->search($shipDescriptionRelatedByWeapon2);
            $this->collShipDescriptionsRelatedByWeapon2->remove($pos);
            if (null === $this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion) {
                $this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion = clone $this->collShipDescriptionsRelatedByWeapon2;
                $this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion->clear();
            }
            $this->shipDescriptionsRelatedByWeapon2ScheduledForDeletion[]= $shipDescriptionRelatedByWeapon2;
            $shipDescriptionRelatedByWeapon2->setSecondWeapon(null);
        }

        return $this;
    }

    /**
     * Clears out the collShipDescriptionsRelatedByWeapon3 collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addShipDescriptionsRelatedByWeapon3()
     */
    public function clearShipDescriptionsRelatedByWeapon3()
    {
        $this->collShipDescriptionsRelatedByWeapon3 = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collShipDescriptionsRelatedByWeapon3 collection loaded partially.
     */
    public function resetPartialShipDescriptionsRelatedByWeapon3($v = true)
    {
        $this->collShipDescriptionsRelatedByWeapon3Partial = $v;
    }

    /**
     * Initializes the collShipDescriptionsRelatedByWeapon3 collection.
     *
     * By default this just sets the collShipDescriptionsRelatedByWeapon3 collection to an empty array (like clearcollShipDescriptionsRelatedByWeapon3());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initShipDescriptionsRelatedByWeapon3($overrideExisting = true)
    {
        if (null !== $this->collShipDescriptionsRelatedByWeapon3 && !$overrideExisting) {
            return;
        }

        $collectionClassName = ShipDescriptionTableMap::getTableMap()->getCollectionClassName();

        $this->collShipDescriptionsRelatedByWeapon3 = new $collectionClassName;
        $this->collShipDescriptionsRelatedByWeapon3->setModel('\Persistence\ShipDescriptionPersistence\ShipDescription');
    }

    /**
     * Gets an array of ShipDescription objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildWeaponDescription is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ShipDescription[] List of ShipDescription objects
     * @throws PropelException
     */
    public function getShipDescriptionsRelatedByWeapon3(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collShipDescriptionsRelatedByWeapon3Partial && !$this->isNew();
        if (null === $this->collShipDescriptionsRelatedByWeapon3 || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collShipDescriptionsRelatedByWeapon3) {
                // return empty collection
                $this->initShipDescriptionsRelatedByWeapon3();
            } else {
                $collShipDescriptionsRelatedByWeapon3 = ShipDescriptionQuery::create(null, $criteria)
                    ->filterByThirdWeapon($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collShipDescriptionsRelatedByWeapon3Partial && count($collShipDescriptionsRelatedByWeapon3)) {
                        $this->initShipDescriptionsRelatedByWeapon3(false);

                        foreach ($collShipDescriptionsRelatedByWeapon3 as $obj) {
                            if (false == $this->collShipDescriptionsRelatedByWeapon3->contains($obj)) {
                                $this->collShipDescriptionsRelatedByWeapon3->append($obj);
                            }
                        }

                        $this->collShipDescriptionsRelatedByWeapon3Partial = true;
                    }

                    return $collShipDescriptionsRelatedByWeapon3;
                }

                if ($partial && $this->collShipDescriptionsRelatedByWeapon3) {
                    foreach ($this->collShipDescriptionsRelatedByWeapon3 as $obj) {
                        if ($obj->isNew()) {
                            $collShipDescriptionsRelatedByWeapon3[] = $obj;
                        }
                    }
                }

                $this->collShipDescriptionsRelatedByWeapon3 = $collShipDescriptionsRelatedByWeapon3;
                $this->collShipDescriptionsRelatedByWeapon3Partial = false;
            }
        }

        return $this->collShipDescriptionsRelatedByWeapon3;
    }

    /**
     * Sets a collection of ShipDescription objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $shipDescriptionsRelatedByWeapon3 A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildWeaponDescription The current object (for fluent API support)
     */
    public function setShipDescriptionsRelatedByWeapon3(Collection $shipDescriptionsRelatedByWeapon3, ConnectionInterface $con = null)
    {
        /** @var ShipDescription[] $shipDescriptionsRelatedByWeapon3ToDelete */
        $shipDescriptionsRelatedByWeapon3ToDelete = $this->getShipDescriptionsRelatedByWeapon3(new Criteria(), $con)->diff($shipDescriptionsRelatedByWeapon3);


        $this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion = $shipDescriptionsRelatedByWeapon3ToDelete;

        foreach ($shipDescriptionsRelatedByWeapon3ToDelete as $shipDescriptionRelatedByWeapon3Removed) {
            $shipDescriptionRelatedByWeapon3Removed->setThirdWeapon(null);
        }

        $this->collShipDescriptionsRelatedByWeapon3 = null;
        foreach ($shipDescriptionsRelatedByWeapon3 as $shipDescriptionRelatedByWeapon3) {
            $this->addShipDescriptionRelatedByWeapon3($shipDescriptionRelatedByWeapon3);
        }

        $this->collShipDescriptionsRelatedByWeapon3 = $shipDescriptionsRelatedByWeapon3;
        $this->collShipDescriptionsRelatedByWeapon3Partial = false;

        return $this;
    }

    /**
     * Returns the number of related BaseShipDescription objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related BaseShipDescription objects.
     * @throws PropelException
     */
    public function countShipDescriptionsRelatedByWeapon3(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collShipDescriptionsRelatedByWeapon3Partial && !$this->isNew();
        if (null === $this->collShipDescriptionsRelatedByWeapon3 || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collShipDescriptionsRelatedByWeapon3) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getShipDescriptionsRelatedByWeapon3());
            }

            $query = ShipDescriptionQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByThirdWeapon($this)
                ->count($con);
        }

        return count($this->collShipDescriptionsRelatedByWeapon3);
    }

    /**
     * Method called to associate a ShipDescription object to this object
     * through the ShipDescription foreign key attribute.
     *
     * @param  ShipDescription $l ShipDescription
     * @return $this|\Persistence\WeaponDescriptionPersistence\WeaponDescription The current object (for fluent API support)
     */
    public function addShipDescriptionRelatedByWeapon3(ShipDescription $l)
    {
        if ($this->collShipDescriptionsRelatedByWeapon3 === null) {
            $this->initShipDescriptionsRelatedByWeapon3();
            $this->collShipDescriptionsRelatedByWeapon3Partial = true;
        }

        if (!$this->collShipDescriptionsRelatedByWeapon3->contains($l)) {
            $this->doAddShipDescriptionRelatedByWeapon3($l);

            if ($this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion and $this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion->contains($l)) {
                $this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion->remove($this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ShipDescription $shipDescriptionRelatedByWeapon3 The ShipDescription object to add.
     */
    protected function doAddShipDescriptionRelatedByWeapon3(ShipDescription $shipDescriptionRelatedByWeapon3)
    {
        $this->collShipDescriptionsRelatedByWeapon3[]= $shipDescriptionRelatedByWeapon3;
        $shipDescriptionRelatedByWeapon3->setThirdWeapon($this);
    }

    /**
     * @param  ShipDescription $shipDescriptionRelatedByWeapon3 The ShipDescription object to remove.
     * @return $this|ChildWeaponDescription The current object (for fluent API support)
     */
    public function removeShipDescriptionRelatedByWeapon3(ShipDescription $shipDescriptionRelatedByWeapon3)
    {
        if ($this->getShipDescriptionsRelatedByWeapon3()->contains($shipDescriptionRelatedByWeapon3)) {
            $pos = $this->collShipDescriptionsRelatedByWeapon3->search($shipDescriptionRelatedByWeapon3);
            $this->collShipDescriptionsRelatedByWeapon3->remove($pos);
            if (null === $this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion) {
                $this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion = clone $this->collShipDescriptionsRelatedByWeapon3;
                $this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion->clear();
            }
            $this->shipDescriptionsRelatedByWeapon3ScheduledForDeletion[]= $shipDescriptionRelatedByWeapon3;
            $shipDescriptionRelatedByWeapon3->setThirdWeapon(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->weaponname = null;
        $this->rangename = null;
        $this->ammo = null;
        $this->reloadtime = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collShipDescriptionsRelatedByWeapon1) {
                foreach ($this->collShipDescriptionsRelatedByWeapon1 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collShipDescriptionsRelatedByWeapon2) {
                foreach ($this->collShipDescriptionsRelatedByWeapon2 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collShipDescriptionsRelatedByWeapon3) {
                foreach ($this->collShipDescriptionsRelatedByWeapon3 as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collShipDescriptionsRelatedByWeapon1 = null;
        $this->collShipDescriptionsRelatedByWeapon2 = null;
        $this->collShipDescriptionsRelatedByWeapon3 = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(WeaponDescriptionTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
