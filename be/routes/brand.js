var express = require('express');
const res = require('express/lib/response');
var router = express.Router();
const { json} = require("express/lib/response");
const Validator = require("fastest-validator");
const { Brands } = require('../models');

const v= new Validator();

router.get('/', async(req, res) => {
    const brans = await Brands.findAll();
    return  res.json(brans);
});
router.post('/', async (req, res) => {
    const schema = {
        brand: "string",
    };
    const validate = v.validate(req.body, schema);
    if (validate.length){
        return res.status(400).json(validate);
    }

    const brand = await Brands.build(req.body);
    await brand.save();

    return res.json(brand);

});
router.put("/:id", async (req, res) => {
    const id =req.params.id;

    let brand = await Brands.findByPk(id);
    if (!brand)
    {
        return res.json({message : 'produk tidak ada'});
    }
    else {
     const schema = { 
      brand: "string|optional",
    };
    const validate = v.validate(req.body, schema);
    if (validate.length) {
        return res.status(400).json(validate);
    }
   brand = await brand.update(req.body);
    return  res.json(brand);
}      
});
router.delete("/:id", async (req, res) => {
    const id = req.params.id;
    const brand = await Brands.findByPk(id);
    if (!brand)
    {
        return res.json({massage : 'produk tidak ada'});
    }
    await brand.destroy();
    return res.json({massage: "data telah dihapus"});
});
module.exports = router;