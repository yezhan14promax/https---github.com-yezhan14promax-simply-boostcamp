<?php
/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* IosVppAppAssignmentSettings File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace Beta\Microsoft\Graph\Model;
/**
* IosVppAppAssignmentSettings class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class IosVppAppAssignmentSettings extends MobileAppAssignmentSettings
{
    /**
    * Set the @odata.type since this type is immediately descended from an abstract
    * type that is referenced as the type in an entity.
    * @param array $propDict The property dictionary
    */
    public function __construct($propDict = array())
    {
        parent::__construct($propDict);
        $this->setODataType("#microsoft.graph.iosVppAppAssignmentSettings");
    }

    /**
    * Gets the isRemovable
    * Whether or not the app can be removed by the user.
    *
    * @return bool|null The isRemovable
    */
    public function getIsRemovable()
    {
        if (array_key_exists("isRemovable", $this->_propDict)) {
            return $this->_propDict["isRemovable"];
        } else {
            return null;
        }
    }

    /**
    * Sets the isRemovable
    * Whether or not the app can be removed by the user.
    *
    * @param bool $val The value of the isRemovable
    *
    * @return IosVppAppAssignmentSettings
    */
    public function setIsRemovable($val)
    {
        $this->_propDict["isRemovable"] = $val;
        return $this;
    }
    /**
    * Gets the preventAutoAppUpdate
    * When TRUE, indicates that the app should not be automatically updated with the latest version from Apple app store. When FALSE, indicates that the app may be auto updated. By default, this property is set to null which internally is treated as FALSE.
    *
    * @return bool|null The preventAutoAppUpdate
    */
    public function getPreventAutoAppUpdate()
    {
        if (array_key_exists("preventAutoAppUpdate", $this->_propDict)) {
            return $this->_propDict["preventAutoAppUpdate"];
        } else {
            return null;
        }
    }

    /**
    * Sets the preventAutoAppUpdate
    * When TRUE, indicates that the app should not be automatically updated with the latest version from Apple app store. When FALSE, indicates that the app may be auto updated. By default, this property is set to null which internally is treated as FALSE.
    *
    * @param bool $val The value of the preventAutoAppUpdate
    *
    * @return IosVppAppAssignmentSettings
    */
    public function setPreventAutoAppUpdate($val)
    {
        $this->_propDict["preventAutoAppUpdate"] = $val;
        return $this;
    }
    /**
    * Gets the preventManagedAppBackup
    * When TRUE, indicates that the app should not be backed up to iCloud. When FALSE, indicates that the app may be backed up to iCloud. By default, this property is set to null which internally is treated as FALSE.
    *
    * @return bool|null The preventManagedAppBackup
    */
    public function getPreventManagedAppBackup()
    {
        if (array_key_exists("preventManagedAppBackup", $this->_propDict)) {
            return $this->_propDict["preventManagedAppBackup"];
        } else {
            return null;
        }
    }

    /**
    * Sets the preventManagedAppBackup
    * When TRUE, indicates that the app should not be backed up to iCloud. When FALSE, indicates that the app may be backed up to iCloud. By default, this property is set to null which internally is treated as FALSE.
    *
    * @param bool $val The value of the preventManagedAppBackup
    *
    * @return IosVppAppAssignmentSettings
    */
    public function setPreventManagedAppBackup($val)
    {
        $this->_propDict["preventManagedAppBackup"] = $val;
        return $this;
    }
    /**
    * Gets the uninstallOnDeviceRemoval
    * Whether or not to uninstall the app when device is removed from Intune.
    *
    * @return bool|null The uninstallOnDeviceRemoval
    */
    public function getUninstallOnDeviceRemoval()
    {
        if (array_key_exists("uninstallOnDeviceRemoval", $this->_propDict)) {
            return $this->_propDict["uninstallOnDeviceRemoval"];
        } else {
            return null;
        }
    }

    /**
    * Sets the uninstallOnDeviceRemoval
    * Whether or not to uninstall the app when device is removed from Intune.
    *
    * @param bool $val The value of the uninstallOnDeviceRemoval
    *
    * @return IosVppAppAssignmentSettings
    */
    public function setUninstallOnDeviceRemoval($val)
    {
        $this->_propDict["uninstallOnDeviceRemoval"] = $val;
        return $this;
    }
    /**
    * Gets the useDeviceLicensing
    * Whether or not to use device licensing.
    *
    * @return bool|null The useDeviceLicensing
    */
    public function getUseDeviceLicensing()
    {
        if (array_key_exists("useDeviceLicensing", $this->_propDict)) {
            return $this->_propDict["useDeviceLicensing"];
        } else {
            return null;
        }
    }

    /**
    * Sets the useDeviceLicensing
    * Whether or not to use device licensing.
    *
    * @param bool $val The value of the useDeviceLicensing
    *
    * @return IosVppAppAssignmentSettings
    */
    public function setUseDeviceLicensing($val)
    {
        $this->_propDict["useDeviceLicensing"] = $val;
        return $this;
    }
    /**
    * Gets the vpnConfigurationId
    * The VPN Configuration Id to apply for this app.
    *
    * @return string|null The vpnConfigurationId
    */
    public function getVpnConfigurationId()
    {
        if (array_key_exists("vpnConfigurationId", $this->_propDict)) {
            return $this->_propDict["vpnConfigurationId"];
        } else {
            return null;
        }
    }

    /**
    * Sets the vpnConfigurationId
    * The VPN Configuration Id to apply for this app.
    *
    * @param string $val The value of the vpnConfigurationId
    *
    * @return IosVppAppAssignmentSettings
    */
    public function setVpnConfigurationId($val)
    {
        $this->_propDict["vpnConfigurationId"] = $val;
        return $this;
    }
}
