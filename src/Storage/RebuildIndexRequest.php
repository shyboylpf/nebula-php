<?php
namespace Nebula\Storage;

/**
 * Autogenerated by Thrift Compiler (0.15.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class RebuildIndexRequest
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'space_id',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'parts',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::I32,
            'elem' => array(
                'type' => TType::I32,
                ),
        ),
        3 => array(
            'var' => 'index_id',
            'isRequired' => false,
            'type' => TType::I32,
        ),
    );

    /**
     * @var int
     */
    public $space_id = null;
    /**
     * @var int[]
     */
    public $parts = null;
    /**
     * @var int
     */
    public $index_id = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['space_id'])) {
                $this->space_id = $vals['space_id'];
            }
            if (isset($vals['parts'])) {
                $this->parts = $vals['parts'];
            }
            if (isset($vals['index_id'])) {
                $this->index_id = $vals['index_id'];
            }
        }
    }

    public function getName()
    {
        return 'RebuildIndexRequest';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->space_id);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::LST) {
                        $this->parts = array();
                        $_size377 = 0;
                        $_etype380 = 0;
                        $xfer += $input->readListBegin($_etype380, $_size377);
                        for ($_i381 = 0; $_i381 < $_size377; ++$_i381) {
                            $elem382 = null;
                            $xfer += $input->readI32($elem382);
                            $this->parts []= $elem382;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->index_id);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('RebuildIndexRequest');
        if ($this->space_id !== null) {
            $xfer += $output->writeFieldBegin('space_id', TType::I32, 1);
            $xfer += $output->writeI32($this->space_id);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->parts !== null) {
            if (!is_array($this->parts)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('parts', TType::LST, 2);
            $output->writeListBegin(TType::I32, count($this->parts));
            foreach ($this->parts as $iter383) {
                $xfer += $output->writeI32($iter383);
            }
            $output->writeListEnd();
            $xfer += $output->writeFieldEnd();
        }
        if ($this->index_id !== null) {
            $xfer += $output->writeFieldBegin('index_id', TType::I32, 3);
            $xfer += $output->writeI32($this->index_id);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}