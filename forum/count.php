<?if (!isset($set['forum_counter']) || $set['forum_counter'] == 0) {    $adm_add_mass = NULL;    $adm_add = NULL;    if (!isset($user) || $user['level'] == 0) {        $q222 = query("SELECT * FROM `forum_f` WHERE `adm` = '1'");        if (rows($q222) != 0) {            $adm_add = ' WHERE ';            while ($adm_f = fetch_assoc($q222)) {                $adm_add_mass[] = $adm_f['id'];            }            for ($zzz = 0; $zzz < count($adm_add_mass); $zzz++) {                $adm_add .= "`id_forum` <> '$adm_add_mass[$zzz]'";                if (count($adm_add_mass) != $zzz + 1) $adm_add .= ' AND ';            }        }    }    echo '(' . result(query("SELECT COUNT(*) FROM `forum_p`$adm_add"), 0) . '/' . result(query("SELECT COUNT(*) FROM `forum_t`$adm_add"), 0) . ')';} else {    echo result(query("SELECT COUNT(*) FROM `user` WHERE `date_last` > '" . (time() - 600) . "' AND `url` like '/forum/%'"), 0) . ' человек';}?>