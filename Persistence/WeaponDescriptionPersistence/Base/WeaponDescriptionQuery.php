<?php

namespace Persistence\WeaponDescriptionPersistence\Base;

use \Exception;
use \PDO;
use Persistence\ShipDescriptionPersistence\ShipDescription;
use Persistence\WeaponDescriptionPersistence\WeaponDescription as ChildWeaponDescription;
use Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery as ChildWeaponDescriptionQuery;
use Persistence\WeaponDescriptionPersistence\Map\WeaponDescriptionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'weaponDescription' table.
 *
 * 
 *
 * @method     ChildWeaponDescriptionQuery orderByWeaponName($order = Criteria::ASC) Order by the weaponName column
 * @method     ChildWeaponDescriptionQuery orderByRangeName($order = Criteria::ASC) Order by the rangeName column
 * @method     ChildWeaponDescriptionQuery orderByAmmo($order = Criteria::ASC) Order by the ammo column
 * @method     ChildWeaponDescriptionQuery orderByReloadTime($order = Criteria::ASC) Order by the reloadTime column
 *
 * @method     ChildWeaponDescriptionQuery groupByWeaponName() Group by the weaponName column
 * @method     ChildWeaponDescriptionQuery groupByRangeName() Group by the rangeName column
 * @method     ChildWeaponDescriptionQuery groupByAmmo() Group by the ammo column
 * @method     ChildWeaponDescriptionQuery groupByReloadTime() Group by the reloadTime column
 *
 * @method     ChildWeaponDescriptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildWeaponDescriptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildWeaponDescriptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildWeaponDescriptionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildWeaponDescriptionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildWeaponDescriptionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildWeaponDescriptionQuery leftJoinShipDescriptionRelatedByWeapon1($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShipDescriptionRelatedByWeapon1 relation
 * @method     ChildWeaponDescriptionQuery rightJoinShipDescriptionRelatedByWeapon1($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShipDescriptionRelatedByWeapon1 relation
 * @method     ChildWeaponDescriptionQuery innerJoinShipDescriptionRelatedByWeapon1($relationAlias = null) Adds a INNER JOIN clause to the query using the ShipDescriptionRelatedByWeapon1 relation
 *
 * @method     ChildWeaponDescriptionQuery joinWithShipDescriptionRelatedByWeapon1($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ShipDescriptionRelatedByWeapon1 relation
 *
 * @method     ChildWeaponDescriptionQuery leftJoinWithShipDescriptionRelatedByWeapon1() Adds a LEFT JOIN clause and with to the query using the ShipDescriptionRelatedByWeapon1 relation
 * @method     ChildWeaponDescriptionQuery rightJoinWithShipDescriptionRelatedByWeapon1() Adds a RIGHT JOIN clause and with to the query using the ShipDescriptionRelatedByWeapon1 relation
 * @method     ChildWeaponDescriptionQuery innerJoinWithShipDescriptionRelatedByWeapon1() Adds a INNER JOIN clause and with to the query using the ShipDescriptionRelatedByWeapon1 relation
 *
 * @method     ChildWeaponDescriptionQuery leftJoinShipDescriptionRelatedByWeapon2($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShipDescriptionRelatedByWeapon2 relation
 * @method     ChildWeaponDescriptionQuery rightJoinShipDescriptionRelatedByWeapon2($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShipDescriptionRelatedByWeapon2 relation
 * @method     ChildWeaponDescriptionQuery innerJoinShipDescriptionRelatedByWeapon2($relationAlias = null) Adds a INNER JOIN clause to the query using the ShipDescriptionRelatedByWeapon2 relation
 *
 * @method     ChildWeaponDescriptionQuery joinWithShipDescriptionRelatedByWeapon2($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ShipDescriptionRelatedByWeapon2 relation
 *
 * @method     ChildWeaponDescriptionQuery leftJoinWithShipDescriptionRelatedByWeapon2() Adds a LEFT JOIN clause and with to the query using the ShipDescriptionRelatedByWeapon2 relation
 * @method     ChildWeaponDescriptionQuery rightJoinWithShipDescriptionRelatedByWeapon2() Adds a RIGHT JOIN clause and with to the query using the ShipDescriptionRelatedByWeapon2 relation
 * @method     ChildWeaponDescriptionQuery innerJoinWithShipDescriptionRelatedByWeapon2() Adds a INNER JOIN clause and with to the query using the ShipDescriptionRelatedByWeapon2 relation
 *
 * @method     ChildWeaponDescriptionQuery leftJoinShipDescriptionRelatedByWeapon3($relationAlias = null) Adds a LEFT JOIN clause to the query using the ShipDescriptionRelatedByWeapon3 relation
 * @method     ChildWeaponDescriptionQuery rightJoinShipDescriptionRelatedByWeapon3($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ShipDescriptionRelatedByWeapon3 relation
 * @method     ChildWeaponDescriptionQuery innerJoinShipDescriptionRelatedByWeapon3($relationAlias = null) Adds a INNER JOIN clause to the query using the ShipDescriptionRelatedByWeapon3 relation
 *
 * @method     ChildWeaponDescriptionQuery joinWithShipDescriptionRelatedByWeapon3($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ShipDescriptionRelatedByWeapon3 relation
 *
 * @method     ChildWeaponDescriptionQuery leftJoinWithShipDescriptionRelatedByWeapon3() Adds a LEFT JOIN clause and with to the query using the ShipDescriptionRelatedByWeapon3 relation
 * @method     ChildWeaponDescriptionQuery rightJoinWithShipDescriptionRelatedByWeapon3() Adds a RIGHT JOIN clause and with to the query using the ShipDescriptionRelatedByWeapon3 relation
 * @method     ChildWeaponDescriptionQuery innerJoinWithShipDescriptionRelatedByWeapon3() Adds a INNER JOIN clause and with to the query using the ShipDescriptionRelatedByWeapon3 relation
 *
 * @method     \Persistence\ShipDescriptionPersistence\ShipDescriptionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildWeaponDescription findOne(ConnectionInterface $con = null) Return the first ChildWeaponDescription matching the query
 * @method     ChildWeaponDescription findOneOrCreate(ConnectionInterface $con = null) Return the first ChildWeaponDescription matching the query, or a new ChildWeaponDescription object populated from the query conditions when no match is found
 *
 * @method     ChildWeaponDescription findOneByWeaponName(string $weaponName) Return the first ChildWeaponDescription filtered by the weaponName column
 * @method     ChildWeaponDescription findOneByRangeName(string $rangeName) Return the first ChildWeaponDescription filtered by the rangeName column
 * @method     ChildWeaponDescription findOneByAmmo(int $ammo) Return the first ChildWeaponDescription filtered by the ammo column
 * @method     ChildWeaponDescription findOneByReloadTime(int $reloadTime) Return the first ChildWeaponDescription filtered by the reloadTime column *

 * @method     ChildWeaponDescription requirePk($key, ConnectionInterface $con = null) Return the ChildWeaponDescription by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWeaponDescription requireOne(ConnectionInterface $con = null) Return the first ChildWeaponDescription matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWeaponDescription requireOneByWeaponName(string $weaponName) Return the first ChildWeaponDescription filtered by the weaponName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWeaponDescription requireOneByRangeName(string $rangeName) Return the first ChildWeaponDescription filtered by the rangeName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWeaponDescription requireOneByAmmo(int $ammo) Return the first ChildWeaponDescription filtered by the ammo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildWeaponDescription requireOneByReloadTime(int $reloadTime) Return the first ChildWeaponDescription filtered by the reloadTime column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildWeaponDescription[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildWeaponDescription objects based on current ModelCriteria
 * @method     ChildWeaponDescription[]|ObjectCollection findByWeaponName(string $weaponName) Return ChildWeaponDescription objects filtered by the weaponName column
 * @method     ChildWeaponDescription[]|ObjectCollection findByRangeName(string $rangeName) Return ChildWeaponDescription objects filtered by the rangeName column
 * @method     ChildWeaponDescription[]|ObjectCollection findByAmmo(int $ammo) Return ChildWeaponDescription objects filtered by the ammo column
 * @method     ChildWeaponDescription[]|ObjectCollection findByReloadTime(int $reloadTime) Return ChildWeaponDescription objects filtered by the reloadTime column
 * @method     ChildWeaponDescription[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class WeaponDescriptionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Persistence\WeaponDescriptionPersistence\Base\WeaponDescriptionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Persistence\\WeaponDescriptionPersistence\\WeaponDescription', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildWeaponDescriptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildWeaponDescriptionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildWeaponDescriptionQuery) {
            return $criteria;
        }
        $query = new ChildWeaponDescriptionQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildWeaponDescription|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(WeaponDescriptionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = WeaponDescriptionTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildWeaponDescription A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT weaponName, rangeName, ammo, reloadTime FROM weaponDescription WHERE weaponName = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildWeaponDescription $obj */
            $obj = new ChildWeaponDescription();
            $obj->hydrate($row);
            WeaponDescriptionTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildWeaponDescription|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(WeaponDescriptionTableMap::COL_WEAPONNAME, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(WeaponDescriptionTableMap::COL_WEAPONNAME, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the weaponName column
     *
     * Example usage:
     * <code>
     * $query->filterByWeaponName('fooValue');   // WHERE weaponName = 'fooValue'
     * $query->filterByWeaponName('%fooValue%', Criteria::LIKE); // WHERE weaponName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $weaponName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function filterByWeaponName($weaponName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($weaponName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WeaponDescriptionTableMap::COL_WEAPONNAME, $weaponName, $comparison);
    }

    /**
     * Filter the query on the rangeName column
     *
     * Example usage:
     * <code>
     * $query->filterByRangeName('fooValue');   // WHERE rangeName = 'fooValue'
     * $query->filterByRangeName('%fooValue%', Criteria::LIKE); // WHERE rangeName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rangeName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function filterByRangeName($rangeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rangeName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WeaponDescriptionTableMap::COL_RANGENAME, $rangeName, $comparison);
    }

    /**
     * Filter the query on the ammo column
     *
     * Example usage:
     * <code>
     * $query->filterByAmmo(1234); // WHERE ammo = 1234
     * $query->filterByAmmo(array(12, 34)); // WHERE ammo IN (12, 34)
     * $query->filterByAmmo(array('min' => 12)); // WHERE ammo > 12
     * </code>
     *
     * @param     mixed $ammo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function filterByAmmo($ammo = null, $comparison = null)
    {
        if (is_array($ammo)) {
            $useMinMax = false;
            if (isset($ammo['min'])) {
                $this->addUsingAlias(WeaponDescriptionTableMap::COL_AMMO, $ammo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ammo['max'])) {
                $this->addUsingAlias(WeaponDescriptionTableMap::COL_AMMO, $ammo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WeaponDescriptionTableMap::COL_AMMO, $ammo, $comparison);
    }

    /**
     * Filter the query on the reloadTime column
     *
     * Example usage:
     * <code>
     * $query->filterByReloadTime(1234); // WHERE reloadTime = 1234
     * $query->filterByReloadTime(array(12, 34)); // WHERE reloadTime IN (12, 34)
     * $query->filterByReloadTime(array('min' => 12)); // WHERE reloadTime > 12
     * </code>
     *
     * @param     mixed $reloadTime The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function filterByReloadTime($reloadTime = null, $comparison = null)
    {
        if (is_array($reloadTime)) {
            $useMinMax = false;
            if (isset($reloadTime['min'])) {
                $this->addUsingAlias(WeaponDescriptionTableMap::COL_RELOADTIME, $reloadTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($reloadTime['max'])) {
                $this->addUsingAlias(WeaponDescriptionTableMap::COL_RELOADTIME, $reloadTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WeaponDescriptionTableMap::COL_RELOADTIME, $reloadTime, $comparison);
    }

    /**
     * Filter the query by a related \Persistence\ShipDescriptionPersistence\ShipDescription object
     *
     * @param \Persistence\ShipDescriptionPersistence\ShipDescription|ObjectCollection $shipDescription the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function filterByShipDescriptionRelatedByWeapon1($shipDescription, $comparison = null)
    {
        if ($shipDescription instanceof \Persistence\ShipDescriptionPersistence\ShipDescription) {
            return $this
                ->addUsingAlias(WeaponDescriptionTableMap::COL_WEAPONNAME, $shipDescription->getWeapon1(), $comparison);
        } elseif ($shipDescription instanceof ObjectCollection) {
            return $this
                ->useShipDescriptionRelatedByWeapon1Query()
                ->filterByPrimaryKeys($shipDescription->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByShipDescriptionRelatedByWeapon1() only accepts arguments of type \Persistence\ShipDescriptionPersistence\ShipDescription or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShipDescriptionRelatedByWeapon1 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function joinShipDescriptionRelatedByWeapon1($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShipDescriptionRelatedByWeapon1');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ShipDescriptionRelatedByWeapon1');
        }

        return $this;
    }

    /**
     * Use the ShipDescriptionRelatedByWeapon1 relation ShipDescription object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Persistence\ShipDescriptionPersistence\ShipDescriptionQuery A secondary query class using the current class as primary query
     */
    public function useShipDescriptionRelatedByWeapon1Query($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinShipDescriptionRelatedByWeapon1($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShipDescriptionRelatedByWeapon1', '\Persistence\ShipDescriptionPersistence\ShipDescriptionQuery');
    }

    /**
     * Filter the query by a related \Persistence\ShipDescriptionPersistence\ShipDescription object
     *
     * @param \Persistence\ShipDescriptionPersistence\ShipDescription|ObjectCollection $shipDescription the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function filterByShipDescriptionRelatedByWeapon2($shipDescription, $comparison = null)
    {
        if ($shipDescription instanceof \Persistence\ShipDescriptionPersistence\ShipDescription) {
            return $this
                ->addUsingAlias(WeaponDescriptionTableMap::COL_WEAPONNAME, $shipDescription->getWeapon2(), $comparison);
        } elseif ($shipDescription instanceof ObjectCollection) {
            return $this
                ->useShipDescriptionRelatedByWeapon2Query()
                ->filterByPrimaryKeys($shipDescription->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByShipDescriptionRelatedByWeapon2() only accepts arguments of type \Persistence\ShipDescriptionPersistence\ShipDescription or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShipDescriptionRelatedByWeapon2 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function joinShipDescriptionRelatedByWeapon2($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShipDescriptionRelatedByWeapon2');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ShipDescriptionRelatedByWeapon2');
        }

        return $this;
    }

    /**
     * Use the ShipDescriptionRelatedByWeapon2 relation ShipDescription object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Persistence\ShipDescriptionPersistence\ShipDescriptionQuery A secondary query class using the current class as primary query
     */
    public function useShipDescriptionRelatedByWeapon2Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinShipDescriptionRelatedByWeapon2($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShipDescriptionRelatedByWeapon2', '\Persistence\ShipDescriptionPersistence\ShipDescriptionQuery');
    }

    /**
     * Filter the query by a related \Persistence\ShipDescriptionPersistence\ShipDescription object
     *
     * @param \Persistence\ShipDescriptionPersistence\ShipDescription|ObjectCollection $shipDescription the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function filterByShipDescriptionRelatedByWeapon3($shipDescription, $comparison = null)
    {
        if ($shipDescription instanceof \Persistence\ShipDescriptionPersistence\ShipDescription) {
            return $this
                ->addUsingAlias(WeaponDescriptionTableMap::COL_WEAPONNAME, $shipDescription->getWeapon3(), $comparison);
        } elseif ($shipDescription instanceof ObjectCollection) {
            return $this
                ->useShipDescriptionRelatedByWeapon3Query()
                ->filterByPrimaryKeys($shipDescription->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByShipDescriptionRelatedByWeapon3() only accepts arguments of type \Persistence\ShipDescriptionPersistence\ShipDescription or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ShipDescriptionRelatedByWeapon3 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function joinShipDescriptionRelatedByWeapon3($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ShipDescriptionRelatedByWeapon3');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ShipDescriptionRelatedByWeapon3');
        }

        return $this;
    }

    /**
     * Use the ShipDescriptionRelatedByWeapon3 relation ShipDescription object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Persistence\ShipDescriptionPersistence\ShipDescriptionQuery A secondary query class using the current class as primary query
     */
    public function useShipDescriptionRelatedByWeapon3Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinShipDescriptionRelatedByWeapon3($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ShipDescriptionRelatedByWeapon3', '\Persistence\ShipDescriptionPersistence\ShipDescriptionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildWeaponDescription $weaponDescription Object to remove from the list of results
     *
     * @return $this|ChildWeaponDescriptionQuery The current query, for fluid interface
     */
    public function prune($weaponDescription = null)
    {
        if ($weaponDescription) {
            $this->addUsingAlias(WeaponDescriptionTableMap::COL_WEAPONNAME, $weaponDescription->getWeaponName(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the weaponDescription table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WeaponDescriptionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WeaponDescriptionTableMap::clearInstancePool();
            WeaponDescriptionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(WeaponDescriptionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(WeaponDescriptionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            WeaponDescriptionTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            WeaponDescriptionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // WeaponDescriptionQuery
