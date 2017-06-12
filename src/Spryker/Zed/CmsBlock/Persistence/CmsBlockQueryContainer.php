<?php

namespace Spryker\Zed\CmsBlock\Persistence;


use Orm\Zed\CmsBlock\Persistence\Map\SpyCmsBlockTemplateTableMap;
use Orm\Zed\CmsBlock\Persistence\SpyCmsBlockGlossaryKeyMappingQuery;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * @method CmsBlockPersistenceFactory getFactory()
 */
class CmsBlockQueryContainer extends AbstractQueryContainer implements CmsBlockQueryContainerInterface
{

    const COLUMN_TEMPLATE_NAME = 'template_name';

    /**
     * @param int $idCmsBlock
     *
     * @return \Orm\Zed\CmsBlock\Persistence\SpyCmsBlockQuery
     */
    public function queryCmsBlockById($idCmsBlock)
    {
        return $this->queryCmsBlock()
            ->filterByIdCmsBlock($idCmsBlock);
    }

    /**
     * @param int $idCmsBlock
     * @return \Orm\Zed\CmsBlock\Persistence\SpyCmsBlockQuery
     */
    public function queryCmsBlockByIdWithTemplateWithGlossary($idCmsBlock)
    {
        return $this->queryCmsBlock()
            ->filterByIdCmsBlock($idCmsBlock)
            ->leftJoinCmsTemplate()
            ->leftJoinSpyCmsBlockGlossaryKeyMapping();
    }

    /**
     * @param string $name
     *
     * @return \Orm\Zed\CmsBlock\Persistence\SpyCmsBlockQuery
     */
    public function queryCmsBlockByName($name)
    {
        return $this->queryCmsBlock()
            ->filterByName($name);
    }

    /**
     * @return \Orm\Zed\CmsBlock\Persistence\SpyCmsBlockQuery
     */
    public function queryCmsBlockWithTemplate()
    {
        return $this->queryCmsBlock()
            ->joinCmsTemplate()
                ->withColumn(SpyCmsBlockTemplateTableMap::COL_TEMPLATE_NAME, static::COLUMN_TEMPLATE_NAME);
    }

    /**
     * @param int $idCmsBlock
     *
     * @return SpyCmsBlockGlossaryKeyMappingQuery
     */
    public function queryCmsBlockGlossaryKeyMappingByIdCmsBlock($idCmsBlock)
    {
        return $this->queryCmsBlockGlossaryKeyMapping()
            ->filterByFkCmsBlock($idCmsBlock);
    }

    /**
     * @return \Orm\Zed\CmsBlock\Persistence\SpyCmsBlockTemplateQuery
     */
    public function queryTemplates()
    {
        return $this->getFactory()
            ->createCmsBlockTemplateQuery();
    }

    /**
     * @return \Orm\Zed\CmsBlock\Persistence\SpyCmsBlockQuery
     */
    protected function queryCmsBlock()
    {
        return $this->getFactory()
            ->createCmsBlockQuery();
    }

    /**
     * @return SpyCmsBlockGlossaryKeyMappingQuery
     */
    protected function queryCmsBlockGlossaryKeyMapping()
    {
        return $this->getFactory()
            ->createCmsBlockGlossaryKeyMappingQuery();
    }


}