<?php
/**
 * This source file is part of GotCms.
 *
 * MSBios\Document is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * MSBios\Document is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along
 * with GotCms. If not, see <http://www.gnu.org/licenses/lgpl-3.0.html>.
 *
 * PHP Version >=5.6
 *
 * @category MSBios\Document
 * @package Frontend
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 * @license GNU/LGPL http://www.gnu.org/licenses/lgpl-3.0.html
 * @link http://msbios.com
 */
namespace MSBios\Document\Frontend;

/**
 * Class Module
 * @package MSBios\Document\Frontend
 */
class Module
{
    const VERSION = '0.0.1dev';

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
