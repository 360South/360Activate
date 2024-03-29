<?php

/**
 * DNS Library for handling lookups and updates. 
 *
 * Copyright (c) 2020, Mike Pultz <mike@mikepultz.com>. All rights reserved.
 *
 * See LICENSE for more details.
 *
 * @category  Networking
 * @package   Net_DNS2
 * @author    Mike Pultz <mike@mikepultz.com>
 * @copyright 2020 Mike Pultz <mike@mikepultz.com>
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link      https://netdns2.com/
 * @since     File available since Release 0.6.0
 *
 */

/**
 * KX Resource Record - RFC2230 section 3.1
 *
 * This class is almost identical to MX, except that the the exchanger
 * domain is not compressed, it's added as a label
 *
 *   +--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+
 *   |                  PREFERENCE                   |
 *   +--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+
 *   /                   EXCHANGER                   /
 *   /                                               /
 *   +--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+--+
 *
 */
class Net_DNS2_RR_KX extends Net_DNS2_RR
{
    /*
     * the preference for this mail exchanger
     */    
    public $preference;
 
    /*
     * the hostname of the mail exchanger
     */
    public $exchange;

    /**
     * method to return the rdata portion of the packet as a string
     *
     * @return  string
     * @access  protected
     *
     */
    protected function rrToString()
    {
        return $this->preference . ' ' . $this->cleanString($this->exchange) . '.';
    }

    /**
     * parses the rdata portion from a standard DNS config line
     *
     * @param array $rdata a string split line of values for the rdata
     *
     * @return boolean
     * @access protected
     *
     */
    protected function rrFromString(array $rdata)
    {
        $this->preference   = array_shift($rdata);
        $this->exchange     = $this->cleanString(array_shift($rdata));
 
        return true;        
    }

    /**
     * parses the rdata of the Net_DNS2_Packet object
     *
     * @param Net_DNS2_Packet &$packet a Net_DNS2_Packet packet to parse the RR from
     *
     * @return boolean
     * @access protected
     *
     */
    protected function rrSet(Net_DNS2_Packet &$packet)
    {
        if ($this->rdlength > 0) {
   
            //
            // parse the preference
            //
            $x = unpack('npreference', $this->rdata);
            $this->preference = $x['preference'];

            //
            // get the exchange entry server)
            //
            $offset = $packet->offset + 2;
            $this->exchange = Net_DNS2_Packet::label($packet, $offset);

            return true;
        }
      
        return false;
    }

    /**
     * returns the rdata portion of the DNS packet
     *
     * @param Net_DNS2_Packet &$packet a Net_DNS2_Packet packet use for
     *                                 compressed names
     *
     * @return mixed                   either returns a binary packed
     *                                 string or null on failure
     * @access protected
     *
     */
    protected function rrGet(Net_DNS2_Packet &$packet)
    {
        if (strlen($this->exchange) > 0) {
     
            $data = pack('nC', $this->preference, strlen($this->exchange)) . 
                $this->exchange;

            $packet->offset += strlen($data);

            return $data;
        }
    
        return null;
    }
}
