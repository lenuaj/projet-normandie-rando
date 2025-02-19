<?php

declare(strict_types=1);

namespace ACP\ConditionalFormat;

use ACP\Expression\ComparisonOperators;
use ACP\Expression\DateOperators;
use ACP\Expression\Exception\OperatorNotFoundException;
use ACP\Expression\StringOperators;

final class Operators
{

    private const LABEL = 'label';
    private const TYPE = 'type';
    private const OPERATOR = 'operator';

    private const TYPE_RELATIVE = 'relative';
    private const TYPE_BETWEEN = 'between';
    private const TYPE_SINGLE = 'single';

    public function get_group(string $operator): string
    {
        if ( ! $this->has_operator($operator)) {
            throw new OperatorNotFoundException($operator);
        }

        static $operator_group_map = null;

        if ($operator_group_map === null) {
            foreach ($this->get_operators() as $group => $operators) {
                foreach ($operators as $definition) {
                    $operator_group_map[$definition[self::OPERATOR]] = $group;
                }
            }
        }

        return $operator_group_map[$operator];
    }

    public function has_operator(string $operator): bool
    {
        foreach ($this->get_operators() as $operator_definitions) {
            foreach ($operator_definitions as $operator_definition) {
                if ($operator === $operator_definition[self::OPERATOR]) {
                    return true;
                }
            }
        }

        return false;
    }

    public function get_operators(): array
    {
        static $operator_groups = null;

        if ($operator_groups === null) {
            $operator_groups = [
                StringOperators::class     => [
                    [
                        self::OPERATOR => StringOperators::CONTAINS,
                        self::LABEL    => _x('Contains', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => StringOperators::NOT_CONTAINS,
                        self::LABEL    => _x('Does Not Contain', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => StringOperators::STARTS_WITH,
                        self::LABEL    => _x('Starts With', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => StringOperators::ENDS_WITH,
                        self::LABEL    => _x('Ends With', 'operator', 'lenuaj-admin-columns'),
                    ],
                ],
                ComparisonOperators::class => [
                    [
                        self::OPERATOR => ComparisonOperators::EQUAL,
                        self::LABEL    => _x('Equals', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => ComparisonOperators::NOT_EQUAL,
                        self::LABEL    => _x('Not Equals', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => ComparisonOperators::LESS_THAN,
                        self::LABEL    => _x('Less Than', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => ComparisonOperators::LESS_THAN_EQUAL,
                        self::LABEL    => _x('Less Than or Equal', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => ComparisonOperators::GREATER_THAN,
                        self::LABEL    => _x('Greater Than', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => ComparisonOperators::GREATER_THAN_EQUAL,
                        self::LABEL    => _x('Greater Than or Equal', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => ComparisonOperators::BETWEEN,
                        self::TYPE     => self::TYPE_BETWEEN,
                        self::LABEL    => _x('Between', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => ComparisonOperators::NOT_BETWEEN,
                        self::TYPE     => self::TYPE_BETWEEN,
                        self::LABEL    => _x('Not Between', 'operator', 'lenuaj-admin-columns'),
                    ],
                ],
                DateOperators::class       => [
                    [
                        self::OPERATOR => DateOperators::DATE_IS,
                        self::LABEL    => _x('Date is', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => DateOperators::DATE_IS_AFTER,
                        self::LABEL    => _x('Date is After', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => DateOperators::DATE_IS_BEFORE,
                        self::LABEL    => _x('Date is Before', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => DateOperators::DATE_BETWEEN,
                        self::LABEL    => _x('Date Between', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => DateOperators::PAST,
                        self::TYPE     => self::TYPE_RELATIVE,
                        self::LABEL    => _x('Past', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => DateOperators::TODAY,
                        self::TYPE     => self::TYPE_RELATIVE,
                        self::LABEL    => _x('Today', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => DateOperators::FUTURE,
                        self::TYPE     => self::TYPE_RELATIVE,
                        self::LABEL    => _x('Future', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => DateOperators::WITHIN_DAYS,
                        self::LABEL    => _x('Within … days', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => DateOperators::GT_DAYS_AGO,
                        self::LABEL    => _x('More than … days ago', 'operator', 'lenuaj-admin-columns'),
                    ],
                    [
                        self::OPERATOR => DateOperators::LT_DAYS_AGO,
                        self::LABEL    => _x('Less than … days ago', 'operator', 'lenuaj-admin-columns'),
                    ],
                ],
            ];

            foreach ($operator_groups as $group => $operators) {
                foreach ($operators as $k => $definition) {
                    if ( ! isset($definition[self::TYPE])) {
                        $operator_groups[$group][$k][self::TYPE] = self::TYPE_SINGLE;
                    }
                }
            }
        }

        return $operator_groups;
    }

}