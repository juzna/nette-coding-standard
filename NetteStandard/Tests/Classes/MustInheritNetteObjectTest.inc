<?php

/*****************  good  *********************/
class DirectOk extends \Nette\Object { }

class ParentOk extends \Nette\Object { }

class ChildOk extends ParentOk { }

/*****************  bad  *********************/

class BadNotInheritAnything { }

class BadNotInheritViaOther extends BadNotInheritAnything { }
