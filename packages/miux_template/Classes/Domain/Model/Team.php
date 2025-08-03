<?php

declare(strict_types=1);

namespace Miux\MiuxTemplate\Domain\Model;


/**
 * This file is part of the "Miux Template" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022
 */

/**
 * Team
 */
class Team extends \GeorgRinger\News\Domain\Model\News
{

    /**
     * teamemail
     *
     * @var string
     */
    protected $teamemail = '';

    /**
     * teampdf
     *
     * @var string
     */
    protected $teampdf = '';

    /**
     * Returns the teamemail
     *
     * @return string
     */
    public function getTeamemail()
    {
        return $this->teamemail;
    }

    /**
     * Sets the teamemail
     *
     * @param string $teamemail
     * @return void
     */
    public function setTeamemail(string $teamemail)
    {
        $this->teamemail = $teamemail;
    }

    /**
     * Returns the teampdf
     *
     * @return string
     */
    public function getTeampdf()
    {
        return $this->teampdf;
    }

    /**
     * Sets the teampdf
     *
     * @param string $teampdf
     * @return void
     */
    public function setTeampdf(string $teampdf)
    {
        $this->teampdf = $teampdf;
    }
}
