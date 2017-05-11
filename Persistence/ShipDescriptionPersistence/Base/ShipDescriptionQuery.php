<?php

namespace Persistence\ShipDescriptionPersistence\Base;

use \Exception;
use \PDO;
use Persistence\ShipDescriptionPersistence\ShipDescription as ChildShipDescription;
use Persistence\ShipDescriptionPersistence\ShipDescriptionQuery as ChildShipDescriptionQuery;
use Persistence\ShipDescriptionPersistence\Map\ShipDescriptionTableMap;
use Persistence\WeaponDescriptionPersistence\WeaponDescription;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'shipDescription' table.
 *
 * 
 *
 * @method     ChildShipDescriptionQuery orderByCivilization($order = Criteria::ASC) Order by the civilization column
 * @method     ChildShipDescriptionQuery orderByDimension($order = Criteria::ASC) Order by the dimension column
 * @method     ChildShipDescriptionQuery orderByShipName($order = Criteria::ASC) Order by the shipName column
 * @method     ChildShipDescriptionQuery orderByShipWeight($order = Criteria::ASC) Order by the shipWeight column
 * @method     ChildShipDescriptionQuery orderByWeapon1($order = Criteria::ASC) Order by the weapon1 column
 * @method     ChildShipDescriptionQuery orderByWeapon2($order = Criteria::ASC) Order by the weapon2 column
 * @method     ChildShipDescriptionQuery orderByWeapon3($order = Criteria::ASC) Order by the weapon3 column
 *
 * @method     ChildShipDescriptionQuery groupByCivilization() Group by the civilization column
 * @method     ChildShipDescriptionQuery groupByDimension() Group by the dimension column
 * @method     ChildShipDescriptionQuery groupByShipName() Group by the shipName column
 * @method     ChildShipDescriptionQuery groupByShipWeight() Group by the shipWeight column
 * @method     ChildShipDescriptionQuery groupByWeapon1() Group by the weapon1 column
 * @method     ChildShipDescriptionQuery groupByWeapon2() Group by the weapon2 column
 * @method     ChildShipDescriptionQuery groupByWeapon3() Group by the weapon3 column
 *
 * @method     ChildShipDescriptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildShipDescriptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildShipDescriptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildShipDescriptionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildShipDescriptionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildShipDescriptionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildShipDescriptionQuery leftJoinWeaponDescriptionRelatedByWeapon1($relationAlias = null) Adds a LEFT JOIN clause to the query using the WeaponDescriptionRelatedByWeapon1 relation
 * @method     ChildShipDescriptionQuery rightJoinWeaponDescriptionRelatedByWeapon1($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WeaponDescriptionRelatedByWeapon1 relation
 * @method     ChildShipDescriptionQuery innerJoinWeaponDescriptionRelatedByWeapon1($relationAlias = null) Adds a INNER JOIN clause to the query using the WeaponDescriptionRelatedByWeapon1 relation
 *
 * @method     ChildShipDescriptionQuery joinWithWeaponDescriptionRelatedByWeapon1($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the WeaponDescriptionRelatedByWeapon1 relation
 *
 * @method     ChildShipDescriptionQuery leftJoinWithWeaponDescriptionRelatedByWeapon1() Adds a LEFT JOIN clause and with to the query using the WeaponDescriptionRelatedByWeapon1 relation
 * @method     ChildShipDescriptionQuery rightJoinWithWeaponDescriptionRelatedByWeapon1() Adds a RIGHT JOIN clause and with to the query using the WeaponDescriptionRelatedByWeapon1 relation
 * @method     ChildShipDescriptionQuery innerJoinWithWeaponDescriptionRelatedByWeapon1() Adds a INNER JOIN clause and with to the query using the WeaponDescriptionRelatedByWeapon1 relation
 *
 * @method     ChildShipDescriptionQuery leftJoinWeaponDescriptionRelatedByWeapon2($relationAlias = null) Adds a LEFT JOIN clause to the query using the WeaponDescriptionRelatedByWeapon2 relation
 * @method     ChildShipDescriptionQuery rightJoinWeaponDescriptionRelatedByWeapon2($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WeaponDescriptionRelatedByWeapon2 relation
 * @method     ChildShipDescriptionQuery innerJoinWeaponDescriptionRelatedByWeapon2($relationAlias = null) Adds a INNER JOIN clause to the query using the WeaponDescriptionRelatedByWeapon2 relation
 *
 * @method     ChildShipDescriptionQuery joinWithWeaponDescriptionRelatedByWeapon2($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the WeaponDescriptionRelatedByWeapon2 relation
 *
 * @method     ChildShipDescriptionQuery leftJoinWithWeaponDescriptionRelatedByWeapon2() Adds a LEFT JOIN clause and with to the query using the WeaponDescriptionRelatedByWeapon2 relation
 * @method     ChildShipDescriptionQuery rightJoinWithWeaponDescriptionRelatedByWeapon2() Adds a RIGHT JOIN clause and with to the query using the WeaponDescriptionRelatedByWeapon2 relation
 * @method     ChildShipDescriptionQuery innerJoinWithWeaponDescriptionRelatedByWeapon2() Adds a INNER JOIN clause and with to the query using the WeaponDescriptionRelatedByWeapon2 relation
 *
 * @method     ChildShipDescriptionQuery leftJoinWeaponDescriptionRelatedByWeapon3($relationAlias = null) Adds a LEFT JOIN clause to the query using the WeaponDescriptionRelatedByWeapon3 relation
 * @method     ChildShipDescriptionQuery rightJoinWeaponDescriptionRelatedByWeapon3($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WeaponDescriptionRelatedByWeapon3 relation
 * @method     ChildShipDescriptionQuery innerJoinWeaponDescriptionRelatedByWeapon3($relationAlias = null) Adds a INNER JOIN clause to the query using the WeaponDescriptionRelatedByWeapon3 relation
 *
 * @method     ChildShipDescriptionQuery joinWithWeaponDescriptionRelatedByWeapon3($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the WeaponDescriptionRelatedByWeapon3 relation
 *
 * @method     ChildShipDescriptionQuery leftJoinWithWeaponDescriptionRelatedByWeapon3() Adds a LEFT JOIN clause and with to the query using the WeaponDescriptionRelatedByWeapon3 relation
 * @method     ChildShipDescriptionQuery rightJoinWithWeaponDescriptionRelatedByWeapon3() Adds a RIGHT JOIN clause and with to the query using the WeaponDescriptionRelatedByWeapon3 relation
 * @method     ChildShipDescriptionQuery innerJoinWithWeaponDescriptionRelatedByWeapon3() Adds a INNER JOIN clause and with to the query using the WeaponDescriptionRelatedByWeapon3 relation
 *
 * @method     \Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildShipDescription findOne(ConnectionInterface $con = null) Return the first ChildShipDescription matching the query
 * @method     ChildShipDescription findOneOrCreate(ConnectionInterface $con = null) Return the first ChildShipDescription matching the query, or a new ChildShipDescription object populated from the query conditions when no match is found
 *
 * @method     ChildShipDescription findOneByCivilization(string $civilization) Return the first ChildShipDescription filtered by the civilization column
 * @method     ChildShipDescription findOneByDimension(int $dimension) Return the first ChildShipDescription filtered by the dimension column
 * @method     ChildShipDescription findOneByShipName(string $shipName) Return the first ChildShipDescription filtered by the shipName column
 * @method     ChildShipDescription findOneByShipWeight(string $shipWeight) Return the first ChildShipDescription filtered by the shipWeight column
 * @method     ChildShipDescription findOneByWeapon1(string $weapon1) Return the first ChildShipDescription filtered by the weapon1 column
 * @method     ChildShipDescription findOneByWeapon2(string $weapon2) Return the first ChildShipDescription filtered by the weapon2 column
 * @method     ChildShipDescription findOneByWeapon3(string $weapon3) Return the first ChildShipDescription filtered by the weapon3 column *

 * @method     ChildShipDescription requirePk($key, ConnectionInterface $con = null) Return the ChildShipDescription by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOne(ConnectionInterface $con = null) Return the first ChildShipDescription matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShipDescription requireOneByCivilization(string $civilization) Return the first ChildShipDescription filtered by the civilization column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOneByDimension(int $dimension) Return the first ChildShipDescription filtered by the dimension column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOneByShipName(string $shipName) Return the first ChildShipDescription filtered by the shipName column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOneByShipWeight(string $shipWeight) Return the first ChildShipDescription filtered by the shipWeight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOneByWeapon1(string $weapon1) Return the first ChildShipDescription filtered by the weapon1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOneByWeapon2(string $weapon2) Return the first ChildShipDescription filtered by the weapon2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOneByWeapon3(string $weapon3) Return the first ChildShipDescription filtered by the weapon3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShipDescription[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildShipDescription objects based on current ModelCriteria
 * @method     ChildShipDescription[]|ObjectCollection findByCivilization(string $civilization) Return ChildShipDescription objects filtered by the civilization column
 * @method     ChildShipDescription[]|ObjectCollection findByDimension(int $dimension) Return ChildShipDescription objects filtered by the dimension column
 * @method     ChildShipDescription[]|ObjectCollection findByShipName(string $shipName) Return ChildShipDescription objects filtered by the shipName column
 * @method     ChildShipDescription[]|ObjectCollection findByShipWeight(string $shipWeight) Return ChildShipDescription objects filtered by the shipWeight column
 * @method     ChildShipDescription[]|ObjectCollection findByWeapon1(string $weapon1) Return ChildShipDescription objects filtered by the weapon1 column
 * @method     ChildShipDescription[]|ObjectCollection findByWeapon2(string $weapon2) Return ChildShipDescription objects filtered by the weapon2 column
 * @method     ChildShipDescription[]|ObjectCollection findByWeapon3(string $weapon3) Return ChildShipDescription objects filtered by the weapon3 column
 * @method     ChildShipDescription[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ShipDescriptionQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Persistence\ShipDescriptionPersistence\Base\ShipDescriptionQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Persistence\\ShipDescriptionPersistence\\ShipDescription', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildShipDescriptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildShipDescriptionQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildShipDescriptionQuery) {
            return $criteria;
        }
        $query = new ChildShipDescriptionQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$civilization, $dimension] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildShipDescription|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ShipDescriptionTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ShipDescriptionTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildShipDescription A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT civilization, dimension, shipName, shipWeight, weapon1, weapon2, weapon3 FROM shipDescription WHERE civilization = :p0 AND dimension = :p1';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);            
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildShipDescription $obj */
            $obj = new ChildShipDescription();
            $obj->hydrate($row);
            ShipDescriptionTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildShipDescription|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ShipDescriptionTableMap::COL_CIVILIZATION, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ShipDescriptionTableMap::COL_DIMENSION, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ShipDescriptionTableMap::COL_CIVILIZATION, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ShipDescriptionTableMap::COL_DIMENSION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the civilization column
     *
     * Example usage:
     * <code>
     * $query->filterByCivilization('fooValue');   // WHERE civilization = 'fooValue'
     * $query->filterByCivilization('%fooValue%', Criteria::LIKE); // WHERE civilization LIKE '%fooValue%'
     * </code>
     *
     * @param     string $civilization The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByCivilization($civilization = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($civilization)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipDescriptionTableMap::COL_CIVILIZATION, $civilization, $comparison);
    }

    /**
     * Filter the query on the dimension column
     *
     * Example usage:
     * <code>
     * $query->filterByDimension(1234); // WHERE dimension = 1234
     * $query->filterByDimension(array(12, 34)); // WHERE dimension IN (12, 34)
     * $query->filterByDimension(array('min' => 12)); // WHERE dimension > 12
     * </code>
     *
     * @param     mixed $dimension The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByDimension($dimension = null, $comparison = null)
    {
        if (is_array($dimension)) {
            $useMinMax = false;
            if (isset($dimension['min'])) {
                $this->addUsingAlias(ShipDescriptionTableMap::COL_DIMENSION, $dimension['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dimension['max'])) {
                $this->addUsingAlias(ShipDescriptionTableMap::COL_DIMENSION, $dimension['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipDescriptionTableMap::COL_DIMENSION, $dimension, $comparison);
    }

    /**
     * Filter the query on the shipName column
     *
     * Example usage:
     * <code>
     * $query->filterByShipName('fooValue');   // WHERE shipName = 'fooValue'
     * $query->filterByShipName('%fooValue%', Criteria::LIKE); // WHERE shipName LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByShipName($shipName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipDescriptionTableMap::COL_SHIPNAME, $shipName, $comparison);
    }

    /**
     * Filter the query on the shipWeight column
     *
     * Example usage:
     * <code>
     * $query->filterByShipWeight('fooValue');   // WHERE shipWeight = 'fooValue'
     * $query->filterByShipWeight('%fooValue%', Criteria::LIKE); // WHERE shipWeight LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipWeight The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByShipWeight($shipWeight = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipWeight)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipDescriptionTableMap::COL_SHIPWEIGHT, $shipWeight, $comparison);
    }

    /**
     * Filter the query on the weapon1 column
     *
     * Example usage:
     * <code>
     * $query->filterByWeapon1('fooValue');   // WHERE weapon1 = 'fooValue'
     * $query->filterByWeapon1('%fooValue%', Criteria::LIKE); // WHERE weapon1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $weapon1 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByWeapon1($weapon1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($weapon1)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipDescriptionTableMap::COL_WEAPON1, $weapon1, $comparison);
    }

    /**
     * Filter the query on the weapon2 column
     *
     * Example usage:
     * <code>
     * $query->filterByWeapon2('fooValue');   // WHERE weapon2 = 'fooValue'
     * $query->filterByWeapon2('%fooValue%', Criteria::LIKE); // WHERE weapon2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $weapon2 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByWeapon2($weapon2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($weapon2)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipDescriptionTableMap::COL_WEAPON2, $weapon2, $comparison);
    }

    /**
     * Filter the query on the weapon3 column
     *
     * Example usage:
     * <code>
     * $query->filterByWeapon3('fooValue');   // WHERE weapon3 = 'fooValue'
     * $query->filterByWeapon3('%fooValue%', Criteria::LIKE); // WHERE weapon3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $weapon3 The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByWeapon3($weapon3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($weapon3)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipDescriptionTableMap::COL_WEAPON3, $weapon3, $comparison);
    }

    /**
     * Filter the query by a related \Persistence\WeaponDescriptionPersistence\WeaponDescription object
     *
     * @param \Persistence\WeaponDescriptionPersistence\WeaponDescription|ObjectCollection $weaponDescription The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByWeaponDescriptionRelatedByWeapon1($weaponDescription, $comparison = null)
    {
        if ($weaponDescription instanceof \Persistence\WeaponDescriptionPersistence\WeaponDescription) {
            return $this
                ->addUsingAlias(ShipDescriptionTableMap::COL_WEAPON1, $weaponDescription->getWeaponName(), $comparison);
        } elseif ($weaponDescription instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ShipDescriptionTableMap::COL_WEAPON1, $weaponDescription->toKeyValue('PrimaryKey', 'WeaponName'), $comparison);
        } else {
            throw new PropelException('filterByWeaponDescriptionRelatedByWeapon1() only accepts arguments of type \Persistence\WeaponDescriptionPersistence\WeaponDescription or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the WeaponDescriptionRelatedByWeapon1 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function joinWeaponDescriptionRelatedByWeapon1($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('WeaponDescriptionRelatedByWeapon1');

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
            $this->addJoinObject($join, 'WeaponDescriptionRelatedByWeapon1');
        }

        return $this;
    }

    /**
     * Use the WeaponDescriptionRelatedByWeapon1 relation WeaponDescription object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery A secondary query class using the current class as primary query
     */
    public function useWeaponDescriptionRelatedByWeapon1Query($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWeaponDescriptionRelatedByWeapon1($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'WeaponDescriptionRelatedByWeapon1', '\Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery');
    }

    /**
     * Filter the query by a related \Persistence\WeaponDescriptionPersistence\WeaponDescription object
     *
     * @param \Persistence\WeaponDescriptionPersistence\WeaponDescription|ObjectCollection $weaponDescription The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByWeaponDescriptionRelatedByWeapon2($weaponDescription, $comparison = null)
    {
        if ($weaponDescription instanceof \Persistence\WeaponDescriptionPersistence\WeaponDescription) {
            return $this
                ->addUsingAlias(ShipDescriptionTableMap::COL_WEAPON2, $weaponDescription->getWeaponName(), $comparison);
        } elseif ($weaponDescription instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ShipDescriptionTableMap::COL_WEAPON2, $weaponDescription->toKeyValue('PrimaryKey', 'WeaponName'), $comparison);
        } else {
            throw new PropelException('filterByWeaponDescriptionRelatedByWeapon2() only accepts arguments of type \Persistence\WeaponDescriptionPersistence\WeaponDescription or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the WeaponDescriptionRelatedByWeapon2 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function joinWeaponDescriptionRelatedByWeapon2($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('WeaponDescriptionRelatedByWeapon2');

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
            $this->addJoinObject($join, 'WeaponDescriptionRelatedByWeapon2');
        }

        return $this;
    }

    /**
     * Use the WeaponDescriptionRelatedByWeapon2 relation WeaponDescription object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery A secondary query class using the current class as primary query
     */
    public function useWeaponDescriptionRelatedByWeapon2Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinWeaponDescriptionRelatedByWeapon2($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'WeaponDescriptionRelatedByWeapon2', '\Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery');
    }

    /**
     * Filter the query by a related \Persistence\WeaponDescriptionPersistence\WeaponDescription object
     *
     * @param \Persistence\WeaponDescriptionPersistence\WeaponDescription|ObjectCollection $weaponDescription The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByWeaponDescriptionRelatedByWeapon3($weaponDescription, $comparison = null)
    {
        if ($weaponDescription instanceof \Persistence\WeaponDescriptionPersistence\WeaponDescription) {
            return $this
                ->addUsingAlias(ShipDescriptionTableMap::COL_WEAPON3, $weaponDescription->getWeaponName(), $comparison);
        } elseif ($weaponDescription instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ShipDescriptionTableMap::COL_WEAPON3, $weaponDescription->toKeyValue('PrimaryKey', 'WeaponName'), $comparison);
        } else {
            throw new PropelException('filterByWeaponDescriptionRelatedByWeapon3() only accepts arguments of type \Persistence\WeaponDescriptionPersistence\WeaponDescription or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the WeaponDescriptionRelatedByWeapon3 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function joinWeaponDescriptionRelatedByWeapon3($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('WeaponDescriptionRelatedByWeapon3');

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
            $this->addJoinObject($join, 'WeaponDescriptionRelatedByWeapon3');
        }

        return $this;
    }

    /**
     * Use the WeaponDescriptionRelatedByWeapon3 relation WeaponDescription object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery A secondary query class using the current class as primary query
     */
    public function useWeaponDescriptionRelatedByWeapon3Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinWeaponDescriptionRelatedByWeapon3($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'WeaponDescriptionRelatedByWeapon3', '\Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildShipDescription $shipDescription Object to remove from the list of results
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function prune($shipDescription = null)
    {
        if ($shipDescription) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ShipDescriptionTableMap::COL_CIVILIZATION), $shipDescription->getCivilization(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ShipDescriptionTableMap::COL_DIMENSION), $shipDescription->getDimension(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the shipDescription table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ShipDescriptionTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ShipDescriptionTableMap::clearInstancePool();
            ShipDescriptionTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ShipDescriptionTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ShipDescriptionTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            ShipDescriptionTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            ShipDescriptionTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ShipDescriptionQuery
