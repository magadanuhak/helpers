<?php


class TreeBuilder
{
    private static string $parentField = '';
    private static string $childrenField = '';
    private static string $keyField = '';
    private static string $orderBy = '';

    /**
     * Построение дерева
     *
     * @param array  $flat          - плоский массив
     * @param int    $root          - ID корневого родительского элемента
     * @param string $parentField   - название родительского поля (по умолчанию parent_id)
     * @param string $childrenField - поле для сохранения дочерних узлов (по умолчанию children)
     * @param string $keyField      - ключевое поле (по умолчанию id)
     * @param string $orderBy        - поле по которому нужно сортировать
     *
     * @return array - дерево
     */
    public static function build(
        array $flat,
        int $root,
        string $parentField = 'parent_id',
        string $childrenField = 'children',
        string $keyField = 'id',
        string $orderBy = 'id'
    ): array {
        self::$parentField = $parentField;
        self::$childrenField = $childrenField;
        self::$keyField = $keyField;
        self::$orderBy = $orderBy;
        $parents = [];
        foreach ($flat as $item) {
            $parents[(int)$item[$parentField]][] = $item;
        }

        return self::buildBranch($parents, $parents[$root]);
    }

    /**
     * Построение ветки
     *
     * @param array $parents  - массив со всеми родителями
     * @param array $children - дети текущей ветки
     *
     * @return array список узлов текущей ветки
     */
    private static function buildBranch(array &$parents, array $children): array
    {
        $branch = [];
        foreach ($children as $child) {
            if (isset($parents[$child[self::$keyField]])) {
                $child[self::$childrenField] = self::buildBranch($parents, $parents[$child[self::$keyField]]);

            }
            $branch[] = $child;
        }

        usort($branch, static function ($item1, $item2) {
            return $item1[self::$orderBy] > $item2[self::$orderBy];
        });

        return $branch;
    }

}
