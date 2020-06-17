<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CmsBlock\Persistence;

use Generated\Shared\Transfer\CmsBlockTransfer;

interface CmsBlockRepositoryInterface
{
    /**
     * @param int $idCmsBlock
     *
     * @return \Generated\Shared\Transfer\CmsBlockTransfer|null
     */
    public function findCmsBlockById(int $idCmsBlock): ?CmsBlockTransfer;

    /**
     * @return int
     */
    public function findMaxIdCmsBlock(): int;

    /**
     * @param string $key
     *
     * @return bool
     */
    public function hasKey(string $key): bool;

    /**
     * @param string $cmsBlockName
     * @param string $storeName
     * @param string $localeName
     *
     * @return \Generated\Shared\Transfer\CmsBlockTransfer|null
     */
    public function findCmsBlockWithGlossary(
        string $cmsBlockName,
        string $storeName,
        string $localeName
    ): ?CmsBlockTransfer;
}
