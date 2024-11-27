import RequestBase from './RequestBase.js';
import {URLpath} from "../functions.js";

export class RequestProduct extends RequestBase {

    constructor() {
        super(`${location.protocol}//${location.hostname}/${URLpath}/api/products`);
    }

    async listProducts() {
        return this.get('/');
    }

    async getProductById(ProductId) {
        return this.get('/:id', { id: ProductId });
    }

    async createProduct(ProductData) {
        return this.post('/', ProductData);
    }

    async updateProduct(ProductData, ProductId) {
        return this.post(`/update/:id`, ProductData, { id: ProductId });
    }

    async deleteProduct(ProductId) {
        return this.delete(`/delete/:id`, { id: ProductId });
    }

}