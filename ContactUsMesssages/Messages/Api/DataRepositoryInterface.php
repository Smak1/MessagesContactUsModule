<?php

namespace ContactUsMesssages\Messages\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use ContactUsMesssages\Messages\Api\Data\DataInterface;

interface DataRepositoryInterface
{
    public function save(DataInterface $data);

    public function getById($dataId);

    public function getList(SearchCriteriaInterface $searchCriteria);

    public function delete(DataInterface $data);

    public function deleteById($dataId);	
}
