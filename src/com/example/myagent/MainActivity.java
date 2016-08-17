package com.example.myagent;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.app.ProgressDialog;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.View;
import android.view.Window;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ProgressBar;
import android.widget.Toast;
import android.app.Activity;
import android.content.Context;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.WindowManager;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebStorage;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.util.Log;
import android.view.KeyEvent;
import android.webkit.JsResult;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;
 
public class MainActivity extends Activity {
	private WebView webView;	

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		webView = (WebView) findViewById(R.id.webView);
		webView.setWebViewClient(new MyWebViewClient());
		
		String url = "http://designhomebd.com/myagent/index.php";
                webView.getSettings().setJavaScriptEnabled(true);
		webView.loadUrl(url);		
	}

	private class MyWebViewClient extends WebViewClient {
		@Override
		 public void onReceivedError(WebView webView, int errorCode, String description, String failingUrl) {
	            try {
	                webView.stopLoading();
	            } catch (Exception e) {
	            }

	            if (webView.canGoBack()) {
	                webView.goBack();
	            }

	            webView.loadUrl("about:blank");
	            AlertDialog alertDialog = new AlertDialog.Builder(MainActivity.this).create();
	            alertDialog.setTitle("Error in your Internet");
	            alertDialog.setMessage("Cannot connect to the System. Check your internet connection and try again.");
	           

	            alertDialog.show();
	            super.onReceivedError(webView, errorCode, description, failingUrl);
	        }
		
		@Override
	    public boolean shouldOverrideUrlLoading(WebView view, String url) {
	        view.loadUrl(url);
	        return true;
	    }
	    
	    
	}	
}
