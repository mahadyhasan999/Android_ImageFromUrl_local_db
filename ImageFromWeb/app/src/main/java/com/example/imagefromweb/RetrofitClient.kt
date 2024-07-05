package com.example.imagefromweb

import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory

object RetrofitClient {

    private const val BASE_URL = "http://10.0.2.2/images/" // localhost for Android emulator

    private val retrofit by lazy {
        Retrofit.Builder()
        .baseUrl(BASE_URL)
        .addConverterFactory(GsonConverterFactory.create())
        .build()
    }

    val apiService: ApiService by lazy {
    retrofit.create(ApiService::class.java)
    }
}