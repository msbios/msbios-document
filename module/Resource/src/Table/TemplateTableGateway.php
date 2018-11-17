<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Document\Resource\Table;

use MSBios\Document\Resource\Form\Element\TemplateTypeElement;
use Zend\Db\ResultSet\ResultSet;

/**
 * Class TemplateTableGateway
 * @package MSBios\Document\Resource\Table
 */
class TemplateTableGateway extends AbstractResource
{
    /**
     * @param $type
     * @return ResultSet
     */
    protected function fetchByType($type)
    {
        return $this->tableGateway->select([
            'type' => $type
        ]);
    }

    /**
     * @return ResultSet
     */
    public function fetchViews()
    {
        return $this->fetchByType(TemplateTypeElement::VIEW);
    }

    /**
     * @return ResultSet
     */
    public function fetchLayouts()
    {
        return $this->fetchByType(TemplateTypeElement::LAYOUT);
    }

//    /**
//     * @param ArrayObject $object
//     * @throws \Exception
//     */
//    public function save(ArrayObject $object)
//    {
//        /** @var array $data */
//        $data = $object->getArrayCopy();
//
//        /** @var int $id */
//        $id = (int) $object['id'];
//
//        if (! $id) {
//            $this->getTableGateway()
//                ->insert($data);
//        } else {
//            if ($this->getTemplate($id)) {
//                $this->getTableGateway()
//                    ->update($data, ['id' => $id]);
//            } else {
//                throw new \Exception('Document id does not exist');
//            }
//        }
//    }
}
