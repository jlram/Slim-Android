package com.example.josluis.projectapi;

import android.content.Intent;
import android.graphics.Color;
import android.net.Uri;
import android.os.Build;
import android.support.annotation.NonNull;
import android.support.annotation.RequiresApi;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.Html;
import android.transition.Explode;
import android.view.MenuItem;
import android.view.View;
import android.view.Window;
import android.widget.ImageButton;

public class MainActivity extends AppCompatActivity {

    BottomNavigationView bottomNavigationView;
    ImageButton imageButton;

    @RequiresApi(api = Build.VERSION_CODES.LOLLIPOP)
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        getWindow().requestFeature(Window.FEATURE_CONTENT_TRANSITIONS);
        getWindow().setExitTransition(new Explode());
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        setTitle("Inicio");

        imageButton = findViewById(R.id.imageButton);
        imageButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent webInt = new Intent(Intent.ACTION_VIEW);
                webInt.setData(Uri.parse("https://github.com/jlram/Slim-Android"));
                startActivity(webInt);
            }
        });

        bottomNavigationView = findViewById(R.id.bottomnavigation);
        bottomNavigationView.setSelectedItemId(R.id.menu_home);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem menuItem) {
            Intent i;
            switch (menuItem.getItemId()) {
                case R.id.menu_category:
                     i = new Intent(MainActivity.this, CategoriesActivity.class);
                    startActivity(i);
                    break;

                case R.id.menu_shoe:
                    i = new Intent(MainActivity.this, ShoesActivity.class);
                    startActivity(i);
                    break;
            }
            return true;
        }
    });
    }

    @Override
    protected void onPostResume() {
        super.onPostResume();
        bottomNavigationView.setSelectedItemId(R.id.menu_home);
    }
}
