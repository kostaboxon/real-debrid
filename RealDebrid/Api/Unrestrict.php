<?php

namespace RealDebrid\Api;

use RealDebrid\Request\Unrestrict\ContainerFileRequest;
use RealDebrid\Request\Unrestrict\ContainerLinkRequest;
use RealDebrid\Request\Unrestrict\FolderRequest;
use RealDebrid\Request\Unrestrict\LinkRequest;

/**
 * /unrestrict namespace
 *
 * Provides a set of methods to unrestrict your hoster links
 * @package RealDebrid\Api
 * @author Valentin GOT
 * @license MIT
 * @api
 */
class Unrestrict extends EndPoint {

    /**
     * Unrestrict a hoster link and get a new unrestricted link
     *
     * @param string $link The original hoster link
     * @param string|null $password Password to unlock the file access hoster side
     * @param string|null $remote Use Remote traffic, dedicated servers and account sharing protections lifted
     * @return \stdClass Unrestricted link(s)
     */
    public function link($link, $password = null, $remote = null) {
        return $this->request(new LinkRequest($this->token, $link, $password, $remote));
    }

    /**
     * Unrestrict a hoster folder link and get individual links
     *
     * @param string $link The hoster folder link
     * @return array URLs
     */
    public function folder($link) {
        return $this->request(new FolderRequest($this->token, $link));
    }

    /**
     * Decrypt a container file (RSDF, CCF, CCF3, DLC)
     *
     * @param string $path Path to the container file
     * @return array URLs
     */
    public function containerFile($path) {
        return $this->request(new ContainerFileRequest($this->token, $path));
    }

    /**
     * Decrypt a container file from a link
     *
     * @param string $link HTTP Link of the container file
     * @return array URLs
     */
    public function containerLink($link) {
        return $this->request(new ContainerLinkRequest($this->token, $link));
    }
}