<?php

namespace PageBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PageRepository
 */
class PageRepository extends EntityRepository
{

    public function getSorted(){

        $pages =  $this->createQueryBuilder('p')
            ->orderBy('p.url')
            ->getQuery()
            ->getResult();
        return $pages;
    }

    public function getPageBySlug($url)
    {

        $page = $this->findOneBy(
            array('url' => $url)
        );

        return($page);
    }

    public function getUrls(){

        $urls =  $this->createQueryBuilder('p')
            ->select('p.url')
            ->getQuery()
            ->getResult();
        $urls = array_values(array_column($urls, "url"));
        return $urls;
    }

    public function getDataFromParent($currentPage, $includingCurrent = false){
        /** @var Page $page */

        $pages = $this->getParentPages($currentPage, $includingCurrent);

        $pageData = array();
        foreach ($pages as $page){
            if($page->getMetaTitle() != '' && $page->getMetaTitle() != null && @$pageData['meta_title'] == null){
                $pageData['meta_title'] = $page->getMetaTitle();
            }
            if($page->getMetaDescription() != '' && $page->getMetaDescription() != null && @$pageData['description'] == null){
                $pageData['meta_description'] = $page->getMetaDescription();
            }
            if($page->getMetaTags() != '' && $page->getMetaTags() != null && @$pageData['tags'] == null){
                $pageData['meta_tags'] = $page->getMetaTags();
            }
        }
        return $pageData;
    }

    public function getParentPages($currentPage, $includingCurrent = false){
        /** @var Page $currentPage */

        $currentUrl = $currentPage->getUrl();
        $aCurrentParameters = explode('/',$currentUrl);
        $urlParentPages[0] = '';
        $i = 1;
        foreach($aCurrentParameters as $parameter){
            if(!isset($urlParentPages[$i])){
                if($includingCurrent)
                $urlParentPages[$i+1] = $parameter;
            } else {
                $urlParentPages[$i+1] = $urlParentPages[$i] . '/'.$parameter;
            }
            $i++;
        }

        $pages =  $this->createQueryBuilder('p')
            ->andWhere('p.url IN (:urlParentPages)')
            ->setParameter('urlParentPages', $urlParentPages)
            ->orderBy('p.url', 'DESC')
            ->getQuery()
            ->getResult();

        return $pages;
    }
}
