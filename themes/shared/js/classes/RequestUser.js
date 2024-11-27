import RequestBase from './RequestBase.js';
import {URLpath} from "../functions.js";

export class RequestUser extends RequestBase {

    constructor() {
        super(`${location.protocol}//${location.hostname}/${URLpath}/api/users`);
    }

    async listUsers() {
        return this.get('/');
    }

    async getUserById(UserId) {
        return this.get('/:id', { id: UserId });
    }

    async createUser(UserData) {
        return this.post('/', UserData);
    }
    async loginUser(UserData) {
        return this.post('/login', UserData);
    }

    async updateUser(UserData, UserId) {
        return this.post(`/update/:id`, UserData, { id: UserId });
    }
    async updateUserImage(UserData, UserId) {
        return this.post(`/update/image/:id`, UserData, { id: UserId });
    }
    async deleteUser(UserId) {
        return this.delete(`/delete/:id`, { id: UserId });
    }

}