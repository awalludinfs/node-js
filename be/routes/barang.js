var express = require('express');
const res = require('express/lib/response');
const Sequelize = require('sequelize');
var router = express.Router();
const {
    json
} = require("express/lib/response");
const Validator = require("fastest-validator");
const {
    Barangs
} = require('../models');

const v = new Validator();

router.get('/', async (req, res) => {
    // const { Op } = require('@sequelize/core');
    const barangs = await Barangs.findAll();
    return res.json(barangs);
});
router.get('/search/:keyword', async (req, res) => {
    
    const
        Op = Sequelize.Op;
        const keyword = req.params.keyword;
    const barangs = await Barangs.findAll({
        where: {
            nama: {
                [Op.like]: `%${keyword}%`, // LIKE '%hat'

            }
        }
    });
    return res.json(barangs);
});
router.get('/:id', async (req, res) => {
    const id = req.params.id;
    const barangs = await Barangs.findByPk(id);
    return res.json(barangs);
});
router.post('/', async (req, res) => {
    const schema = {
        nama: "string",
        brand: "string",
        keterangan: "string|optional",
    };
    const validate = v.validate(req.body, schema);
    if (validate.length) {
        return res.status(400).json(validate);
    }

    const barang = await Barangs.build(req.body);
    await barang.save();

    return res.json(barang);

});
router.put("/:id", async (req, res) => {
    const id = req.params.id;

    let barang = await Barangs.findByPk(id);
    if (!barang) {
        return res.json({
            message: 'produk tidak ada'
        });
    } else {
        const schema = {
            nama: "string|optionnal",
            brand: "string|optional",
            keterangan: "string|optional",
        };
        const validate = v.validate(req.body, schema);
        if (validate.length) {
            return res.status(400).json(validate);
        }
        barang = await barang.update(req.body);
        return res.json(barang);
    }
});
router.delete("/:id", async (req, res) => {
    const id = req.params.id;
    const barang = await Barangs.findByPk(id);
    if (!barang) {
        return res.json({
            massage: 'produk tidak ada'
        });
    }
    await barang.destroy();
    return res.json({
        massage: "data telah dihapus"
    });
});
module.exports = router;