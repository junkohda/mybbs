function validationKeyUserMail(val) {
    if ((isEmpty(val)) || (!val.match(mailRegex1) && !val.match(mailRegex2))) {
        validationError(errmsgKeyValUserMail);
        return false;
    }
    return true;
}

function validationKeyUserPassword(val) {
    if (isEmpty(val)) {
        validationError(errmsgKeyValUserPassword);
        return false;
    }
    return true;
}

function validationKeyDepotCode(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenDepotCode) {
        validationError(errmsgKeyValidationDepot);
        return false;
    }
    return true;
}

function validationKeyDepotMail(val) {
    if (isEmpty(val)) {
        return true;
    }
    if (!val.match(mailRegex3)) {
        validationError(errmsgKeyValUserMail);
        return false;
    }
    return true;
}

function validationKeySku(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenSkuKey) {
        validationError(errmsgKeyValidationSkuKey);
        return false;
    }
    return true;
}

function validationKeyJuchuNo(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenJuchuNoKey) {
        validationError(errmsgKeyValidationJuchuNoKey);
        return false;
    }
    return true;
}

function validationKeyOrderDate(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (!val.match(dateRegex)) {
        validationError(errmsgKeyValidationOrderDate);
        return false;
    }
    return true;
}

function validationKeyShopSelected(val) {
    if (isEmpty(val) || val == 0) {
        return true;
    }

    if (val.length > maxLenCommonCode) {
        validationError(errmsgKeyValidationShopSelected);
        return false;
    }
    return true;
}

function validationKeyJuchuStatusSelected(val) {
    if (isEmpty(val) || val == 0) {
        return true;
    }

    if (val.length > maxLenCommonCode) {
        validationError(errmsgKeyValidationJuchuStatusSelected);
        return false;
    }
    return true;
}

function validationKeySupplierCode(val) {
    if (isEmpty(val) || val == 0) {
        return true;
    }

    if (val.length > maxLenSupplierCode) {
        validationError(errmsgKeyValidationSupplierCode);
        return false;
    }
    return true;
}

function validationKeyTotalFrom(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenSupplierCode) {
        validationError(errmsgKeyValidationTotalFrom);
        return false;
    }
    return true;
}

function validationKeyTotalTo(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenSupplierCode) {
        validationError(errmsgKeyValidationTotalTo);
        return false;
    }
    return true;
}

function validationKeyCustomerName(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenCustomerNameKana) {
        validationError(errmsgKeyValidationCustomerName);
        return false;
    }
    return true;
}

function validationKeyPaymentTypeSelected(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenPaymentType) {
        validationError(errmsgKeyValidationPaymentTypeSelected);
        return false;
    }
    return true;
}

function validationKeyItemName(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenItemName) {
        validationError(errmsgKeyValidationItemName);
        return false;
    }
    return true;
}

function validationKeyCustomerZip(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.replace('-', '').length > maxLenZipCode) {
        validationError(errmsgKeyValidationCustomerZip);
        return false;
    }
    return true;
}

function validationKeyCustomerAddress(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.replace('-', '').length > maxLenAddress) {
        validationError(errmsgKeyValidationCustomerAddress);
        return false;
    }
}

function validationKeyCustomerTel(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.replace('-', '').length > maxLenTelNo) {
        validationError(errmsgKeyValidationCustomerTel);
        return false;
    }
    return true;
}

function validationKeyDelivererZip(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.replace('-', '').length > maxLenZipCode) {
        validationError(errmsgKeyValidationDelivererZip);
        return false;
    }
    return true;
}

function validationKeyDelivererAddress(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.replace('-', '').length > maxLenAddress) {
        validationError(errmsgKeyValidationDelivererAddress);
        return false;
    }
}

function validationKeyDelivererTel(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.replace('-', '').length > maxLenTelNo) {
        validationError(errmsgKeyValidationDelivererTel);
        return false;
    }
    return true;
}

function validationKeyDeliveryMethodCode(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenDeliveryMethodCode) {
        validationError(errmsgKeyValidationDeliveryMethodCode);
        return false;
    }
    return true;
}

function validationKeyDelivererId(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenCommonCode) {
        validationError(errmsgKeyValidationDelivererId);
        return false;
    }
    return true;
}

function validationKeyShipExpDate(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (!val.match(dateRegex)) {
        validationError(errmsgKeyValidationShipExpDate);
        return false;
    }
    return true;
}

function validationKeyShipDate(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (!val.match(dateRegex)) {
        validationError(errmsgKeyValidationShipDate);
        return false;
    }
    return true;
}

function validationKeyLogiVal(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (!val.length > maxLenLogiVal) {
        validationError(errmsgKeyValidationLogiVal);
        return false;
    }
    return true;
}

function validationKeySizeCode(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenSizeCode) {
        validationError(errmsgKeyValidationSizeCode);
        return false;
    }
    return true;
}

function validationKeyHenpinSelected(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenHenpinSelected) {
        validationError(errmsgKeyValidationHenpinSelected);
        return false;
    }
    return true;
}

function validationValCustomerZip(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.replace('-', '').length > maxLenZipCode) {
        validationError(errmsgValValidationCustomerZip);
        return false;
    }
    return true;
}

function validationValCustomerAddress(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenAddress) {
        validationError(errmsgValValidationCustomerAddress);
        return false;
    }
    return true;
}

function validationValDelivererZip(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.replace('-', '').length > maxLenZipCode) {
        validationError(errmsgValValidationDelivererZip);
        return false;
    }
    return true;
}

function validationValDelivererAddress(val) {
    if (isEmpty(val)) {
        return true;
    }

    if (val.length > maxLenAddress) {
        validationError(errmsgValValidationDelivererAddress);
        return false;
    }
    return true;
}
function validationValDepotCd(val) {
    if (isEmpty(val)) {
        validationError('depot_cd' + errmsgValValidationRequired);
        return false;
    }
    if (val.length > maxLenDepotCode) {
        validationError(errmsgKeyValidationDepot);
        return false;
    }
    return true;
}


function validationValSku(val) {
    if (isEmpty(val)) {
        validationError('SKU' + errmsgValValidationRequired);
        return false;
    }
    if (val.length > maxLenSku) {
        validationError(errmsgKeyValidationSku);
        return false;
    }
    return true;
}

function validationValGtinCd(val) {
    if (val.length > maxLenGtinCd) {
        validationError(errmsgValValidationGtinCd);
        return false;
    }
    return true;
}

function validationValOrderCnt(val) {
    if (isEmpty(val)) {
        validationError('受注数' + errmsgValValidationRequired);
        return false;
    }
    if (val == '0') {
        validationError(errmsgValValidationOrderCntZero);
        return false;
    }
    return true;
}

function validationValShipCnt(val) {
    if (val == 0) {
        return true;
    }
    if (isEmpty(val)) {
        validationError('出荷数' + errmsgValValidationRequired);
        return false;
    }
    return true;
}

function validationValDeliveryType(val) {
    if (isEmpty(val)) {
        validationError('配送種別' + errmsgValValidationRequired);
        return false;
    }
    if (val.length > maxLenDeliveryType) {
        validationError(errmsgValValidationDeliveryType);
        return false;
    }
    return true;
}

function validationValCanDaibiki(val) {
    if (isEmpty(val)) {
        validationError('代引き取扱フラグ' + errmsgValValidationRequired);
        return false;
    }
    if (val.length > maxLenCanDaibiki) {
        validationError(errmsgValValidationCanDaibiki);
        return false;
    }
    return true;
}

function validationValDepotZip(val) {
    if (isEmpty(val)) {
        return true;
    }
    if (val.length > maxLenZipCode) {
        validationError(errmsgValValidationDepotZipCd);
        return false;
    }
    return true;
}

function validationValCodeType(val) {
    if (isEmpty(val)) {
        validationError('コード種別' + errmsgValValidationRequired);
        return false;
    }
    return true;
}

function validationValLocation(val) {
    if (isEmpty(val)) {
        validationError('棚番' + errmsgValValidationRequired);
        return false;
    }
    if (val.length > maxLenLocation) {
        validationError(errmsgValValidationLocation);
        return false;
    }
    return true;
}

function validationValStockCnt(val) {
    if (isEmpty(val)) {
        validationError('在庫数量' + errmsgValValidationRequired);
        return false;
    }
    if (val.length > maxLenStockCnt) {
        validationError(errmsgValValidationStockCnt);
        return false;
    }
    return true;
}

function validationValHikiateCnt(val) {
    if (isEmpty(val)) {
        validationError('引当数量' + errmsgValValidationRequired);
        return false;
    }
    if (val < 0) {
        validationError('引当数量' + errmsgValValidationRequired);
        return false;
    }
    /** 
    if (isEmpty(val)) {
        validationError('引当数量' + errmsgValValidationRequired);
        return false;
    }
    if (val.length > maxLenHikiateCnt) {
        validationError(errmsgValValidationHikiateCnt);
        return false;
    }**/
    return true;
}

function validationValUserMail(val) {
    if ((isEmpty(val)) || (!val.match(mailRegex1) && !val.match(mailRegex2))) {
        validationError(errmsgKeyValUserMail);
        return false;
    }
    return true;
}

function validationValUserPassword(val) {
    if (isEmpty(val)) {
        validationError(errmsgKeyValUserPassword);
        return false;
    }
    if (val.length < minLenPassword || val.length > maxLenPassword) {
        validationError(errmsgValValidationPassword);
        return false;
    }
    return true;
}

function validationValUsername(val) {
    if (isEmpty(val)) {
        validationError('ユーザー名' + errmsgValValidationRequired);
        return false;
    }
    if (val.length > maxLenUserName) {
        validationError(errmsgValValidationUserName);
        return false;
    }
    return true;
}

function validationValUserPriv(val) {
    if (isEmpty(val)) {
        validationError('権限' + errmsgValValidationRequired);
        return false;
    }
    return true;
}

function validationValNumber(val, min, max, fieldName) {
    if (val < min || val > max) {
        validationError(fieldName + "は、" + min + " 以上 " + max + " 以下の値を入力して下さい");
        return false;
    }
    return true;
}

function validationValHenpinCnt(val, orderCnt) {
    if (val < 0 || val > orderCnt) {
        validationError('返品数は受注数以下の正数を入力してください');
        return false;
    }
    return true;
}

function validationDateIntegrity(fromDate, toDate) {
    if (isEmpty(fromDate) || isEmpty(toDate)) {
        return true;
    }

    var errorFlg = false;
    if (fromDate.split('-')[0] > toDate.split('-')[0]) {
        errorFlg = true;
    }

    var monthSameFlg = false;
    if (!errorFlg && fromDate.split('-')[1] == toDate.split('-')[1]) {
        monthSameFlg = true;
    } else {
        if (fromDate.split('-')[1] > toDate.split('-')[1]) {
            errorFlg = true;
        }
    }

    if (errorFlg) {
        validationError(errmsgKeyValifdationDateIntegrity);
        return false;
    }

    if (fromDate.split('-')[2] == null || toDate.split('-')[2] == null) {
        return true;
    }

    if (!errorFlg && monthSameFlg) {
        if (fromDate.split('-')[2] > toDate.split('-')[2]) {
            errorFlg = true;
        }
    }

    if (errorFlg) {
        validationError(errmsgKeyValifdationDateIntegrity);
        return false;
    }

    return true;
}

function validationKingakuIntegrity(fromKingaku, toKingaku) {
    if (isEmpty(new String(fromKingaku)) || isEmpty(new String(toKingaku))) {
        return true;
    }

    if (fromKingaku > toKingaku) {
        validationError(errmsgKeyValidationKingakuIntegrity);
        return false;
    }

    return true;
}

function validationKeisuIntegrity(fromKeisu, toKeisu) {
    if (isEmpty(new String(fromKeisu)) || isEmpty(new String(toKeisu))) {
        return true;
    }

    if (fromKeisu > toKeisu) {
        validationError(errmsgKeyValidationKeisuIntegrity);
        return false;
    }

    return true;
}

function setValidationFocus(id) {
    document.getElementById(id).focus();
}

function isEmpty(val) {
    return (val == null || val == "") ? true : false;
}