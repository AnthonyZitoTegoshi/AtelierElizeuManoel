<?php

namespace App\Helper;

use App\Model\LoginModel as LoginModel;
use App\Model\UserModel as UserModel;

class LevelHelper {
    static int $permissionTypes = 5;
    static int $colorPalettePermission = 0;
    static int $createElementPermission = 1;
    static int $editElementPermission = 2;
    static int $createUserPermission = 3;
    static int $editUserPermission = 4;

    static function getPermissions(string $token): ?string {
        $login = (new LoginModel)->find(
            'token = :token',
            'token=' . HashHelper::encrypt($token, substr($token, 0, 12))
        );
        if ($login->count() > 0) {
            $login = $login->fetch();
            $user = (new UserModel)->find('sid = :sid', 'sid=' . $login->user_sid);
            if ($user->count() > 0) {
                $user = $user->fetch();
                $permissions = $user->permission_type;
                if (strlen($permissions) == LevelHelper::$permissionTypes) {
                    return $permissions;
                }
            }
        }
        return null;
    }

    static function hasColorPalettePermission(string $permissions): bool {
        if (strlen($permissions) != LevelHelper::$permissionTypes) {
            return false;
        }
        return $permissions[LevelHelper::$colorPalettePermission] === "1";
    }

    static function hasCreateElementPermission(string $permissions): bool {
        if (strlen($permissions) != LevelHelper::$permissionTypes) {
            return false;
        }
        return $permissions[LevelHelper::$createElementPermission] === "1";
    }

    static function hasEditElementPermission(string $permissions): bool {
        if (strlen($permissions) != LevelHelper::$permissionTypes) {
            return false;
        }
        return $permissions[LevelHelper::$editElementPermission] === "1";
    }

    static function hasCreateUserPermission(string $permissions): bool {
        if (strlen($permissions) != LevelHelper::$permissionTypes) {
            return false;
        }
        return $permissions[LevelHelper::$createUserPermission] === "1";
    }

    static function hasEditUserPermission(string $permissions): bool {
        if (strlen($permissions) != LevelHelper::$permissionTypes) {
            return false;
        }
        return $permissions[LevelHelper::$editUserPermission] === "1";
    }
}
