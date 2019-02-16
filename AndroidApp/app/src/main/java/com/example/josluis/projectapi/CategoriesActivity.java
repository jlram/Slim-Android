package com.example.josluis.projectapi;

import android.content.Intent;
import android.graphics.Color;
import android.os.Build;
import android.support.annotation.NonNull;
import android.support.annotation.RequiresApi;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.transition.Explode;
import android.view.MenuItem;
import android.view.Window;

public class CategoriesActivity extends AppCompatActivity {

    BottomNavigationView bottomNavigationView;

    @RequiresApi(api = Build.VERSION_CODES.LOLLIPOP)
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        getWindow().requestFeature(Window.FEATURE_CONTENT_TRANSITIONS);
        getWindow().setExitTransition(new Explode());
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_categories);
        setTitle("Categorías");
        setTitleColor(Color.BLACK);

        bottomNavigationView = findViewById(R.id.bottomnavigation);

        bottomNavigationView.setSelectedItemId(R.id.menu_category);

        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
            Intent i;
            switch (menuItem.getItemId()) {
                case R.id.menu_home:
                    i = new Intent(CategoriesActivity.this, MainActivity.class);
                    startActivity(i);
                    finish();
                    break;

                case R.id.menu_shoe:
                    i = new Intent(CategoriesActivity.this, ShoesActivity.class);
                    startActivity(i);
                    finish();
                    break;
            }


                return true;
            }
        });

    }
}
