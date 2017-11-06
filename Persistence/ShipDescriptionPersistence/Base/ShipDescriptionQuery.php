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
 * Base class that represents a query for the 'ShipDescription' table.
 *
 *
 *
 * @method     ChildShipDescriptionQuery orderByCivilization($order = Criteria::ASC) Order by the civilization column
 * @method     ChildShipDescriptionQuery orderByDimension($order = Criteria::ASC) Order by the dimension column
 * @method     ChildShipDescriptionQuery orderByShipname($order = Criteria::ASC) Order by the shipname column
 * @method     ChildShipDescriptionQuery orderByShipweight($order = Criteria::ASC) Order by the shipweight column
 * @method     ChildShipDescriptionQuery orderByWeapon1($order = Criteria::ASC) Order by the weapon1 column
 * @method     ChildShipDescriptionQuery orderByWeapon2($order = Criteria::ASC) Order by the weapon2 column
 * @method     ChildShipDescriptionQuery orderByWeapon3($order = Criteria::ASC) Order by the weapon3 column
 *
 * @method     ChildShipDescriptionQuery groupByCivilization() Group by the civilization column
 * @method     ChildShipDescriptionQuery groupByDimension() Group by the dimension column
 * @method     ChildShipDescriptionQuery groupByShipname() Group by the shipname column
 * @method     ChildShipDescriptionQuery groupByShipweight() Group by the shipweight column
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
 * @method     ChildShipDescriptionQuery leftJoinFirstWeapon($relationAlias = null) Adds a LEFT JOIN clause to the query using the FirstWeapon relation
 * @method     ChildShipDescriptionQuery rightJoinFirstWeapon($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FirstWeapon relation
 * @method     ChildShipDescriptionQuery innerJoinFirstWeapon($relationAlias = null) Adds a INNER JOIN clause to the query using the FirstWeapon relation
 *
 * @method     ChildShipDescriptionQuery joinWithFirstWeapon($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the FirstWeapon relation
 *
 * @method     ChildShipDescriptionQuery leftJoinWithFirstWeapon() Adds a LEFT JOIN clause and with to the query using the FirstWeapon relation
 * @method     ChildShipDescriptionQuery rightJoinWithFirstWeapon() Adds a RIGHT JOIN clause and with to the query using the FirstWeapon relation
 * @method     ChildShipDescriptionQuery innerJoinWithFirstWeapon() Adds a INNER JOIN clause and with to the query using the FirstWeapon relation
 *
 * @method     ChildShipDescriptionQuery leftJoinSecondWeapon($relationAlias = null) Adds a LEFT JOIN clause to the query using the SecondWeapon relation
 * @method     ChildShipDescriptionQuery rightJoinSecondWeapon($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SecondWeapon relation
 * @method     ChildShipDescriptionQuery innerJoinSecondWeapon($relationAlias = null) Adds a INNER JOIN clause to the query using the SecondWeapon relation
 *
 * @method     ChildShipDescriptionQuery joinWithSecondWeapon($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the SecondWeapon relation
 *
 * @method     ChildShipDescriptionQuery leftJoinWithSecondWeapon() Adds a LEFT JOIN clause and with to the query using the SecondWeapon relation
 * @method     ChildShipDescriptionQuery rightJoinWithSecondWeapon() Adds a RIGHT JOIN clause and with to the query using the SecondWeapon relation
 * @method     ChildShipDescriptionQuery innerJoinWithSecondWeapon() Adds a INNER JOIN clause and with to the query using the SecondWeapon relation
 *
 * @method     ChildShipDescriptionQuery leftJoinThirdWeapon($relationAlias = null) Adds a LEFT JOIN clause to the query using the ThirdWeapon relation
 * @method     ChildShipDescriptionQuery rightJoinThirdWeapon($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ThirdWeapon relation
 * @method     ChildShipDescriptionQuery innerJoinThirdWeapon($relationAlias = null) Adds a INNER JOIN clause to the query using the ThirdWeapon relation
 *
 * @method     ChildShipDescriptionQuery joinWithThirdWeapon($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ThirdWeapon relation
 *
 * @method     ChildShipDescriptionQuery leftJoinWithThirdWeapon() Adds a LEFT JOIN clause and with to the query using the ThirdWeapon relation
 * @method     ChildShipDescriptionQuery rightJoinWithThirdWeapon() Adds a RIGHT JOIN clause and with to the query using the ThirdWeapon relation
 * @method     ChildShipDescriptionQuery innerJoinWithThirdWeapon() Adds a INNER JOIN clause and with to the query using the ThirdWeapon relation
 *
 * @method     \Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildShipDescription findOne(ConnectionInterface $con = null) Return the first ChildShipDescription matching the query
 * @method     ChildShipDescription findOneOrCreate(ConnectionInterface $con = null) Return the first ChildShipDescription matching the query, or a new ChildShipDescription object populated from the query conditions when no match is found
 *
 * @method     ChildShipDescription findOneByCivilization(string $civilization) Return the first ChildShipDescription filtered by the civilization column
 * @method     ChildShipDescription findOneByDimension(int $dimension) Return the first ChildShipDescription filtered by the dimension column
 * @method     ChildShipDescription findOneByShipname(string $shipname) Return the first ChildShipDescription filtered by the shipname column
 * @method     ChildShipDescription findOneByShipweight(int $shipweight) Return the first ChildShipDescription filtered by the shipweight column
 * @method     ChildShipDescription findOneByWeapon1(string $weapon1) Return the first ChildShipDescription filtered by the weapon1 column
 * @method     ChildShipDescription findOneByWeapon2(string $weapon2) Return the first ChildShipDescription filtered by the weapon2 column
 * @method     ChildShipDescription findOneByWeapon3(string $weapon3) Return the first ChildShipDescription filtered by the weapon3 column *

 * @method     ChildShipDescription requirePk($key, ConnectionInterface $con = null) Return the ChildShipDescription by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOne(ConnectionInterface $con = null) Return the first ChildShipDescription matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShipDescription requireOneByCivilization(string $civilization) Return the first ChildShipDescription filtered by the civilization column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOneByDimension(int $dimension) Return the first ChildShipDescription filtered by the dimension column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOneByShipname(string $shipname) Return the first ChildShipDescription filtered by the shipname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOneByShipweight(int $shipweight) Return the first ChildShipDescription filtered by the shipweight column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOneByWeapon1(string $weapon1) Return the first ChildShipDescription filtered by the weapon1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOneByWeapon2(string $weapon2) Return the first ChildShipDescription filtered by the weapon2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildShipDescription requireOneByWeapon3(string $weapon3) Return the first ChildShipDescription filtered by the weapon3 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildShipDescription[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildShipDescription objects based on current ModelCriteria
 * @method     ChildShipDescription[]|ObjectCollection findByCivilization(string $civilization) Return ChildShipDescription objects filtered by the civilization column
 * @method     ChildShipDescription[]|ObjectCollection findByDimension(int $dimension) Return ChildShipDescription objects filtered by the dimension column
 * @method     ChildShipDescription[]|ObjectCollection findByShipname(string $shipname) Return ChildShipDescription objects filtered by the shipname column
 * @method     ChildShipDescription[]|ObjectCollection findByShipweight(int $shipweight) Return ChildShipDescription objects filtered by the shipweight column
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
        $sql = 'SELECT civilization, dimension, shipname, shipweight, weapon1, weapon2, weapon3 FROM ShipDescription WHERE civilization = :p0 AND dimension = :p1';
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
     * Filter the query on the shipname column
     *
     * Example usage:
     * <code>
     * $query->filterByShipname('fooValue');   // WHERE shipname = 'fooValue'
     * $query->filterByShipname('%fooValue%', Criteria::LIKE); // WHERE shipname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $shipname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByShipname($shipname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shipname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipDescriptionTableMap::COL_SHIPNAME, $shipname, $comparison);
    }

    /**
     * Filter the query on the shipweight column
     *
     * Example usage:
     * <code>
     * $query->filterByShipweight(1234); // WHERE shipweight = 1234
     * $query->filterByShipweight(array(12, 34)); // WHERE shipweight IN (12, 34)
     * $query->filterByShipweight(array('min' => 12)); // WHERE shipweight > 12
     * </code>
     *
     * @param     mixed $shipweight The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function filterByShipweight($shipweight = null, $comparison = null)
    {
        if (is_array($shipweight)) {
            $useMinMax = false;
            if (isset($shipweight['min'])) {
                $this->addUsingAlias(ShipDescriptionTableMap::COL_SHIPWEIGHT, $shipweight['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($shipweight['max'])) {
                $this->addUsingAlias(ShipDescriptionTableMap::COL_SHIPWEIGHT, $shipweight['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ShipDescriptionTableMap::COL_SHIPWEIGHT, $shipweight, $comparison);
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
    public function filterByFirstWeapon($weaponDescription, $comparison = null)
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
            throw new PropelException('filterByFirstWeapon() only accepts arguments of type \Persistence\WeaponDescriptionPersistence\WeaponDescription or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FirstWeapon relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function joinFirstWeapon($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FirstWeapon');

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
            $this->addJoinObject($join, 'FirstWeapon');
        }

        return $this;
    }

    /**
     * Use the FirstWeapon relation WeaponDescription object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery A secondary query class using the current class as primary query
     */
    public function useFirstWeaponQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinFirstWeapon($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FirstWeapon', '\Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery');
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
    public function filterBySecondWeapon($weaponDescription, $comparison = null)
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
            throw new PropelException('filterBySecondWeapon() only accepts arguments of type \Persistence\WeaponDescriptionPersistence\WeaponDescription or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SecondWeapon relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function joinSecondWeapon($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SecondWeapon');

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
            $this->addJoinObject($join, 'SecondWeapon');
        }

        return $this;
    }

    /**
     * Use the SecondWeapon relation WeaponDescription object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery A secondary query class using the current class as primary query
     */
    public function useSecondWeaponQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSecondWeapon($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SecondWeapon', '\Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery');
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
    public function filterByThirdWeapon($weaponDescription, $comparison = null)
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
            throw new PropelException('filterByThirdWeapon() only accepts arguments of type \Persistence\WeaponDescriptionPersistence\WeaponDescription or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ThirdWeapon relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildShipDescriptionQuery The current query, for fluid interface
     */
    public function joinThirdWeapon($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ThirdWeapon');

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
            $this->addJoinObject($join, 'ThirdWeapon');
        }

        return $this;
    }

    /**
     * Use the ThirdWeapon relation WeaponDescription object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery A secondary query class using the current class as primary query
     */
    public function useThirdWeaponQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinThirdWeapon($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ThirdWeapon', '\Persistence\WeaponDescriptionPersistence\WeaponDescriptionQuery');
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
     * Deletes all rows from the ShipDescription table.
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
